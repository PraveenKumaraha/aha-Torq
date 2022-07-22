<?php

namespace App\Http\Controllers\Backend\Admin\Bike\Masters;

use App\Models\BikeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Models\BikeBrand;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BikeModelController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('Bike.Masters.Model.index');
   }

   public function getAllBikeModels(Request $request)
   {


      if ($request->ajax()) {

         $queries = BikeModel::with('brands')->orderby('created_at', 'desc')->get();

         //  dd($queries);

         return Datatables::of($queries)
            // ->addColumn('image_url', function ($queries) {
            //    return "<img src='" . asset($queries->image_url) . "' width='60px'>";
            // })
            ->addColumn('name', function ($queries) {
               return Str::words($queries->bike_models, 10, '...');
            })
            ->addColumn('brandname', function ($queries) {
               $brand_name = "";
               if ($queries->brands) {
                  $brand_name = $queries->brands->brand_name;
               }
               return Str::words($brand_name, 10, '...');
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
         $brandLists = BikeBrand::where('status', 1)->select('brand_name', 'id')->get();

         $view = View::make('Bike.Masters.Model.create', compact('brandLists'))->render();
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

      $rules = ['bike_model' => 'required', 'brand' => 'required'];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
         return response()->json([
            'type' => 'error',
            'errors' => $validator->getMessageBag()->toArray()
         ]);
      } else {
         $model = new BikeModel;
         $model->brand_id = $request->input('brand');
         $model->bike_model = $request->input('bike_model');
         $model->status = 1;
         $model->save(); //
         return response()->json(['type' => 'success', 'message' => "Successfully Created"]);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\BikeModel  $bikeModel
    * @return \Illuminate\Http\Response
    */
   public function show(BikeModel $bikeModel)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\BikeModel  $bikeModel
    * @return \Illuminate\Http\Response
    */
   public function edit(Request $request, $id)
   {

      if ($request->ajax()) {
         $bike_model = BikeModel::where('id', $id)->select('bike_model', 'id', 'brand_id')->first();
         $brandLists = BikeBrand::where('status', '1')->select('brand_name', 'id')->get();


         $view = View::make('Bike.Masters.Model.edit', compact('bike_model', 'brandLists'))->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\BikeModel  $bikeModel
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, BikeModel $bikeModel)
   {
      if ($request->ajax()) { 
         $rules = ['brand' => 'required'];
         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
               'type' => 'error',
               'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {
            $model = BikeModel::findOrFail($bikeModel->id);
            $model->brand_id = $request->input('brand');
            $model->bike_model = $request->input('bike_model');
            $model->status = $request->input('status');
            $model->update(); //
            return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\BikeModel  $bikeModel
    * @return \Illuminate\Http\Response
    */
   public function destroy(Request $request, BikeModel $bikeModel)
   {
      if ($request->ajax()) {

         $bikeModel->delete();
         return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }
}
