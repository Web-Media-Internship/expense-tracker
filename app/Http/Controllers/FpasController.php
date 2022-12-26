<?php

namespace App\Http\Controllers;

use App\Models\Fpas;
use App\Http\Requests\StoreFpasRequest;
use App\Http\Requests\UpdateFpasRequest;

class FpasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFpasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFpasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fpas  $fpas
     * @return \Illuminate\Http\Response
     */
    public function show(Fpas $fpas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fpas  $fpas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fpas $fpas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFpasRequest  $request
     * @param  \App\Models\Fpas  $fpas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFpasRequest $request, Fpas $fpas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fpas  $fpas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fpas $fpas)
    {
        //
    }
}
