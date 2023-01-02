<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WalletGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class WalletGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('walletgroup.wltg', [
            "title" => "Wallet",
            "wltg" => WalletGroup::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/walletgroup');
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
            'is_active' => 'required'
        ]);

        $slug = md5($request->name);

        $mi = DB::table('wallet_groups')->select(DB::raw('MAX(id) as kode'));
        if($mi->count()>0)
        {
            foreach($mi->get() as $k)
            {
                $id = ((int) $k->kode) + 1;
            }
        }else{
            $id = "1";
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = date('s').$id.$slug.date('hi');

        WalletGroup::create($validatedData);

        return redirect('/walletgroup')->with('success', 'New Wallet Has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalletGroup  $walletGroup
     * @return \Illuminate\Http\Response
     */
    public function show(walletgroup $walletgroup)
    {
        Session::put('wg', request()->fullUrl());

        return view('walletgroup.wlt', [
            'wlt' => $walletgroup,
            'wl' => $walletgroup->wallets,
            'title' => "Wallet detail"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WalletGroup  $walletGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(WalletGroup $walletGroup)
    {
        return redirect('/walletgroup');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WalletGroup  $walletGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WalletGroup $walletgroup)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'is_active' => 'required'
        ]);
        $wi = ([$walletgroup->id]);


        $validatedData['user_id'] = auth()->user()->id;

        WalletGroup::where('id', $wi)->update($validatedData);

        if(session(key: 'wg'))
        {
            return redirect(session(key: 'wg'))->with('success', 'Wallet Has been updated!');
        }

        return redirect('/walletgroup')->with('success', 'Wallet Has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WalletGroup  $walletGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(walletgroup $walletgroup)
    {
        walletgroup::destroy($walletgroup->id);
        Wallet::where('wallet_group_id', $walletgroup->id)->delete();

        return redirect('/walletgroup')->with('success', 'Wallet Has been deleted!');
    }
}
