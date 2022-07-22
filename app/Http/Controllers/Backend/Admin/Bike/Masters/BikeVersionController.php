<?php

namespace App\Http\Controllers\Backend\Admin\Bike\Masters;

use App\Models\BikeVersion;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Support\Str;
use App\Models\BikeBrand;
use Illuminate\Support\Facades\Validator;

class BikeVersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Bike.Masters.Version.index');
    }
    public function getAllBikeVersions(Request $request)
    {
        if ($request->ajax()) {

            $queries = BikeVersion::with('models', 'models.brands')->orderby('created_at', 'desc')->get();
            
            dd($queries);

            return Datatables::of($queries)
               // ->addColumn('image_url', function ($queries) {
               //    return "<img src='" . asset($queries->image_url) . "' width='60px'>";
               // })
               ->addColumn('name', function ($queries) {
   
                  return Str::words($queries->version, 10, '...');
               })
               ->addColumn('modelname', function ($queries) {
   
                  return Str::words($queries->models->model_name, 10, '...');
               })
               ->addColumn('brandname', function ($queries) {
                  $modelData = $queries->models->brands;
                
                  return Str::words($modelData->brand_name, 10, '...');
               })
               ->addColumn('status', function ($queries) {
                  return $queries->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
               })
               ->addColumn('action', function ($queries) {
                  $html = '<div class="btn-group">';
                  $html .= '<a data-toggle="tooltip"  id="' . $queries->id . '" class="btn btn-xs btn-info mr-1 edit" title="Edit"><i class="fa fa-edit"></i> </a>';
                  $html .= '<a data-toggle="tooltip"  id="' . $queries->id . '" class="btn btn-xs btn-danger delete" title="Delete"><i class="fa fa-trash"></i> </a>';
                  $html .= '</div>';
                  return $html;
               })
               ->rawColumns(['action', 'status'])
               ->addIndexColumn()
               ->make(true);
         } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $brandLists = BikeBrand::where('status', '1')->select('brand_name', 'id')->get();
            $view = View::make('Bike.Masters.Version.create', compact('brandLists'))->render();
            return response()->json(['html' => $view]);
        }else {
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
     * @param  \App\Models\BikeVersion  $bikeVersion
     * @return \Illuminate\Http\Response
     */
    public function show(BikeVersion $bikeVersion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BikeVersion  $bikeVersion
     * @return \Illuminate\Http\Response
     */
    public function edit(BikeVersion $bikeVersion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BikeVersion  $bikeVersion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BikeVersion $bikeVersion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BikeVersion  $bikeVersion
     * @return \Illuminate\Http\Response
     */
    public function destroy(BikeVersion $bikeVersion)
    {
        //
    }
}
