<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WalletGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/walletgroup');
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
            'description' => 'required|max:100',
            'wallet_group_id' => 'required',
            'is_active' => 'required'
        ]);

        Wallet::create($validatedData);

        if(session(key: 'wg'))
        {
            return redirect(session(key: 'wg'));
        }

        return redirect('/walletgroup')->with('success', 'New Wallet Has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        Session::put('wl', request()->fullUrl());
        
        return view('walletgroup.wld', [
            'wlt' => $wallet,
            'title' => "Wallet detail"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        return redirect('/walletgroup');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'description' => 'required|max:100',
            'is_active' => 'required'
        ]);
        $wi = ([$wallet->id]);

        Wallet::where('id', $wi)->update($validatedData);

        if(session(key: 'wl'))
        {
            return redirect(session(key: 'wl'))->with('success', 'Wallet Has been updated!');
        }

        return redirect('/walletgroup')->with('success', 'Wallet Has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        wallet::destroy($wallet->id);

        if(session(key: 'wg'))
        {
            return redirect(session(key: 'wg'))->with('success', 'Wallet Has been deleted!');
        }

        return redirect('/walletgroup')->with('success', 'Wallet Has been deleted!');
    }
}
