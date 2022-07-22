<?php


namespace App\Http\Controllers\Backend\Admin\Bike\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BikeFuelType;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BikeFuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Bike.Masters.FuelType.index');
    }
    public function getAllBikeFuelTypes(Request $request)
    {

        if ($request->ajax()) {


            $queries = BikeFuelType::whereNull("deleted_at")->orderby('created_at', 'desc')->get();


            return Datatables::of($queries)
                // ->addColumn('image_url', function ($queries) {
                //    return "<img src='" . asset($queries->image_url) . "' width='60px'>";
                // })
                ->addColumn('name', function ($queries) {
                    return Str::words($queries->bike_fuel, 10, '...');
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

            $view = View::make('Bike.Masters.FuelType.create')->render();
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

        $rules = ['bike_fuel' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'type' => 'error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);

        } else {
            $model = new BikeFuelType();
            $model->bike_fuel = $request->bike_fuel;
            $model->status = "1";
            $model->save();
            return response()->json(['type' => 'success', 'message' => "Successfully Created"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BikeFuleType  $bikeFuleType
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BikeFuleType  $bikeFuleType
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Request $request, $id) 
    {
        if ($request->ajax()) {


            $bikeFuelType = BikeFuelType::where('id', $id)->first();
            $view = View::make('Bike.Masters.FuelType.edit', compact('bikeFuelType'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BikeFuleType  $bikeFuleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = BikeFuelType::where('id', $id)->first();
        $model->bike_fuel = $request->bike_fuel;
        $model->status = $request->status;
        $model->save();
        return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BikeFuleType  $bikeFuleType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = BikeFuelType::where('id', $id)->first();
        $model->deleted_at = date("Y-m-d H-i-s");

        $model->save();
        return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
    }
}
