<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Fpas;
use App\Models\WalletGroup;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fpas = Fpas::where('user_id', auth()->user()->id);
        if ($fpas->count() > 0) {
            foreach ($fpas->get() as $fp) {
                if (Carbon::now() > $fp->expired_at) {
                    Fpas::destroy($fp->id);
                }
            }
        }

        return view('transaction.trsn', [
            "title" => "Transaction",
            "trn" => Transaction::where('user_id', auth()->user()->id)->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.create', [
            "title" => "Transaction",
            "ctg" => Category::where('user_id', auth()->user()->id)
                ->where('is_active', '1')->get(),
            "wlt" => WalletGroup::where('user_id', auth()->user()->id)
                ->join('wallets', 'wallet_groups.id', '=', 'wallets.wallet_group_id')
                ->select('wallets.name', 'wallets.id', 'wallets.is_active')
                ->where('wallet_groups.is_active', '1')
                ->where('wallets.is_active', '1')
                ->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'category_id' => 'required',
            'wallet_id' => 'required',
            'mutation' => 'required',
            'amount' => 'required|max:9',
            'date' => 'required',
            'description' => 'required|max:100'
        ]);

        $slug = md5($request->name);

        $mi = DB::table('transactions')->select(DB::raw('MAX(id) as kode'));
        $kd = "";
        if($mi->count()>0)
        {
            foreach($mi->get() as $k)
            {
                $dk = ((int) $k->kode) + 1;
            }
        }else{
            $dk = "1";
        }
        $kd = date('ymd').sprintf("%03s", $dk);

        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['amount'] = preg_replace("/[^0-9]/", "", $validatedData['amount']);
        $validatedData['code'] = $kd;
        $validatedData['slug'] = date('s').$dk.$slug.date('hi');

        Transaction::create($validatedData);

        return redirect('/transaction')->with('success', 'New Transaction Has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        Session::put('td', request()->fullUrl());
        
        return view('transaction.detail', [
            'trd' => $transaction,
            'title' => "Transaction detail"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', [
            'trd' => $transaction,
            
            "ctg" => Category::where('user_id', auth()->user()->id)->get()
                ->where('is_active', '1'),
            "wlt" => WalletGroup::where('user_id', auth()->user()->id)
                ->join('wallets', 'wallet_groups.id', '=', 'wallets.wallet_group_id')
                ->select('wallets.name', 'wallets.id', 'wallets.is_active')
                ->where('wallet_groups.is_active', '1')
                ->where('wallets.is_active', '1')
                ->get(),
            'title' => "Edit Transaction"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'category_id' => 'required',
            'wallet_id' => 'required',
            'mutation' => 'required',
            'amount' => 'required|max:9',
            'date' => 'required',
            'description' => 'required|max:100'
        ]);
        $ti = [$transaction->id];
        Transaction::where('id', $ti)->update($validatedData);
        
        if(session(key: 'td'))
        {
            return redirect(session(key: 'td'))->with('success', 'Transaction Has been updated!');
        }

        return redirect('/transaction')->with('success', 'Transaction Has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);

        return redirect('/transaction')->with('success', 'Transaction Has been deleted!');
    }
}
