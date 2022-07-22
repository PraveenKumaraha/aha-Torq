<?php

namespace App\Http\Controllers\Backend\Admin\Car\Masters;

use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use App\Models\CarVersion;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CarVersionController extends Controller
{

   public function index()
   {

      return view('Car.Masters.Version.index');
   }
   public function getAllCarVersions(Request $request)
   {


      if ($request->ajax()) {

         $queries = CarVersion::with('models', 'models.brands')->orderby('created_at', 'desc')->get();

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



   public function create(Request $request)
   {
      if ($request->ajax()) {
         $brandLists = CarBrand::where('status', 1)->select('brand_name', 'id')->get();
         $view = View::make('Car.Masters.Version.create', compact('brandLists'))->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   public function store(Request $request)
   {
      $rules = ['model' => 'required', 'brand' => 'required', 'version' => 'required'];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
         return response()->json([
            'type' => 'error',
            'errors' => $validator->getMessageBag()->toArray()
         ]);
      } else {
         $model = new CarVersion;
         $model->version = $request->input('version');
         $model->model_id = $request->input('model');
         $model->status = 1;
         $model->save(); //
         return response()->json(['type' => 'success', 'message' => "Successfully Created"]);
      }
   }

   public function edit(Request $request, CarVersion $carVersion)
   {
      if ($request->ajax()) {

         $datas = CarVersion::with('models', 'models.brands')->where('id', $carVersion->id)->first();

         $brand_id = $datas->models->brands->id;

         $brandLists = CarBrand::where('status', 1)->select('brand_name', 'id')->get();
       

         $modelLists = CarModel::where('status', 1)->select('model_name', 'id')->get();

         $view = View::make('Car.Masters.Version.edit', compact('datas', 'brandLists', 'modelLists', 'brand_id'))->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }





   public function update(Request $request, CarVersion $carVersion)
   {

      if ($request->ajax()) {

         $rules = ['model' => 'required', 'brand' => 'required', 'version' => 'required'];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
               'type' => 'error',
               'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {


            $model = CarVersion::findOrFail($carVersion->id);
            $model->version = $request->input('version');
            $model->model_id = $request->input('model');
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
}
