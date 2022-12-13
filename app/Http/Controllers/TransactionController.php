<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
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
        return view('transaction.trsn', [
            "title" => "Transaction",
            "trn" => Transaction::where('user_id', auth()->user()->id)->get()
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
            "trn" => Transaction::where('user_id', auth()->user()->id)->get()
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
            'transaction_category_id' => 'required',
            'wallet_id' => 'required',
            'mutation' => 'required',
            'decimal' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);

        $mi = DB::table('transactions')->select(DB::raw('MAX(RIGHT(id,3)) as kode'));
        $kd = "";
        if($mi->count()>0)
        {
            foreach($mi->get() as $k)
            {
                $tmp = ((int) $k->kode) + 1;
                $kd = date('ymd').sprintf("%03s", $tmp);
            }
        }else{
            $kd = date('ymd')."001";
        }
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['code'] = $kd;

        Transaction::create($validatedData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
