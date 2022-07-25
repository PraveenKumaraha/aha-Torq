<?php

namespace App\Http\Controllers\Backend\Admin\Car\Masters;

use App\Models\AddCar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarBodyType;
use App\Models\CarBrand;
use App\Models\CarFuelType;
use App\Models\CarTransmissionType;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AddCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Car.AddCar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $brandLists = CarBrand::where('status', 1)->select('brand_name', 'id')->get();
            $bodyLists = CarBodyType::where('status',1)->select('name', 'id')->get();
            $fuelLists = CarFuelType::where('status', '1')->select('name', 'id')->get();
            $transmissionLists = CarTransmissionType::where('status', '1')->select('name', 'id')->get();
             $view = View::make('Car.AddCar.create', compact('brandLists','bodyLists','fuelLists','transmissionLists'))->render();
             return response()->json(['html' => $view]);
          } else {
             return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
          }
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
     * @param  \App\Models\AddCar  $addCar
     * @return \Illuminate\Http\Response
     */
    public function show(AddCar $addCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddCar  $addCar
     * @return \Illuminate\Http\Response
     */
    public function edit(AddCar $addCar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddCar  $addCar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddCar $addCar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddCar  $addCar
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddCar $addCar)
    {
        //
    }
}
