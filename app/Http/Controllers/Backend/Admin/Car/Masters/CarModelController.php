<?php

namespace App\Http\Controllers\Backend\Admin\Car\Masters;

use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CarModelController extends Controller
{

   public function index()
   {
       
      return view('Car.Masters.Model.index');
   }
   public function getAllCarModels(Request $request)
   {

   
      if ($request->ajax()) {

         $queries = CarModel::with('brands')->orderby('created_at', 'desc')->get();
      

         return Datatables::of($queries)
            // ->addColumn('image_url', function ($queries) {
            //    return "<img src='" . asset($queries->image_url) . "' width='60px'>";
            // })
            ->addColumn('name', function ($queries) {
               return Str::words($queries->model_name, 10, '...');
            })
            ->addColumn('brandname', function ($queries) { 
               $brand_name="";
               if($queries->brands){
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



   public function create(Request $request)
   {
      if ($request->ajax()) {
        $brandLists = CarBrand::where('status', 1)->select('brand_name', 'id')->get();
         $view = View::make('Car.Masters.Model.create', compact('brandLists'))->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   public function store(Request $request)
   {
     

      $rules = ['model_name' => 'required','brand' => 'required'];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
         return response()->json([
            'type' => 'error',
            'errors' => $validator->getMessageBag()->toArray()
         ]);
      } else {
         $model = new CarModel;
         $model->brand_id = $request->input('brand');
         $model->model_name = $request->input('model_name');
         $model->image_url = "";
         $model->status = 1;
         $model->save(); //
         return response()->json(['type' => 'success', 'message' => "Successfully Created"]);
      }
   }

   public function edit(Request $request, CarModel $carModel)
   {
    
      if ($request->ajax()) {
        $brandLists = CarBrand::where('status', 1)->select('brand_name', 'id')->get();

         $view = View::make('Car.Masters.Model.edit', compact('carModel','brandLists'))->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }





   public function update(Request $request, CarModel $carModel)
   {
    
      if ($request->ajax()) {

        $rules = ['model_name' => 'required','brand' => 'required'];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
               'type' => 'error',
               'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {


            $model = CarModel::findOrFail($carModel->id);
            $model->model_name = $request->input('model_name');
            $model->brand_id = $request->input('brand');
            $model->status = $request->input('status');
            $model->save(); //
            return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }


   public function destroy(Request $request, CarModel $carModel)
   {
      if ($request->ajax()) {


         $CarModel->delete();
         return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }
   public function allCarModelsByBrandId(Request $request)
   {

       $models = CarModel::where('brand_id', $request->brand_id)->get(["model_name", "id"]);
       return response()->json($models);
   }
}
