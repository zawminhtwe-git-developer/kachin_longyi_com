<?php

namespace App\Http\Controllers;

use App\Models\PortFolio;
use App\Http\Requests\StorePortFolioRequest;
use App\Http\Requests\UpdatePortFolioRequest;

class PortFolioController extends Controller
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
     * @param  \App\Http\Requests\StorePortFolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortFolioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortFolio  $portFolio
     * @return \Illuminate\Http\Response
     */
    public function show(PortFolio $portFolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortFolio  $portFolio
     * @return \Illuminate\Http\Response
     */
    public function edit(PortFolio $portFolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortFolioRequest  $request
     * @param  \App\Models\PortFolio  $portFolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortFolioRequest $request, PortFolio $portFolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortFolio  $portFolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortFolio $portFolio)
    {
        //
    }
}
