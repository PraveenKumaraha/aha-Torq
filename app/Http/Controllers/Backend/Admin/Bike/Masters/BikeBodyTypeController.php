<?php

namespace App\Http\Controllers\Backend\Admin\Bike\Masters;

use App\Models\BikeBodyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BikeBodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BikeBodyType  $bikeBodyType
     * @return \Illuminate\Http\Response
     */
    public function show(BikeBodyType $bikeBodyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BikeBodyType  $bikeBodyType
     * @return \Illuminate\Http\Response
     */
    public function edit(BikeBodyType $bikeBodyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BikeBodyType  $bikeBodyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BikeBodyType $bikeBodyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BikeBodyType  $bikeBodyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BikeBodyType $bikeBodyType)
    {
        //
    }
}
