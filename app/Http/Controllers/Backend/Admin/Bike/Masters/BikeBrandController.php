<?php

namespace App\Http\Controllers\Backend\Admin\Bike\Masters;

use App\Models\BikeBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BikeBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Bike.Masters.Brand.index');
    }
    public function getAllBikeBrands(Request $request)
    {

        if ($request->ajax()) {


            $queries = BikeBrand::orderby('created_at', 'desc')->get();


            return Datatables::of($queries)
                // ->addColumn('image_url', function ($queries) {
                //    return "<img src='" . asset($queries->image_url) . "' width='60px'>";
                // })
                ->addColumn('name', function ($queries) {
                    return Str::words($queries->brand_name, 10, '...');
                })
                ->addColumn('status', function ($queries) {
                    return $queries->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In Active</span>';
                })
                ->addColumn('action', function ($queries) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $queries->id . '" class="btn btn-xs btn-info mr-1 edit" title="Edit"><i class="fa fa-edit"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $queries->id . '" class="btn btn-xs btn-danger delete" title="Delete"><i class="fa fa-trash"></i> </a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['action', 'status', 'image_url'])
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

            $view = View::make('Bike.Masters.Brand.create')->render();
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
        $rules = ['brand_name' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'type' => 'error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        } else {
            $model = new BikeBrand();
            $model->brand_name = $request->brand_name;
            $model->status = "1";
            
            $model->save();
            return response()->json(['type' => 'success', 'message' => "Successfully Created"]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BikeBrand  $bikeBrand
     * @return \Illuminate\Http\Response
     */
    public function show(BikeBrand $bikeBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BikeBrand  $bikeBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BikeBrand $bikeBrand)
    {
        if ($request->ajax()) {
            $view = View::make('Bike.Masters.Brand.edit', compact('bikeBrand'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BikeBrand  $bikeBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BikeBrand $bikeBrand)
    {
        if ($request->ajax()) {
            $rules = ['brand_name' => 'required'];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $model = BikeBrand::findOrFail($bikeBrand->id);
                $model->brand_name = $request->input('brand_name');
                $model->status = $request->input('status');
                $model->update();
                return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BikeBrand  $bikeBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BikeBrand $bikeBrand)
    {
        if ($request->ajax()) {

            $bikeBrand->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
           return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
