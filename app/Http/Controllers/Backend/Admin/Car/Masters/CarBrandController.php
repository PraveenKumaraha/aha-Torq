<?php

namespace App\Http\Controllers\Backend\Admin\Car\Masters;

use App\Models\CarBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CarBrandController extends Controller
{

   public function index()
   {
      return view('Car.Masters.Brand.index');
   }
   public function getAllCarBrands(Request $request)
   {

      if ($request->ajax()) {

         $queries = CarBrand::orderby('created_at', 'desc')->get();

         return Datatables::of($queries)
            // ->addColumn('image_url', function ($queries) {
            //    return "<img src='" . asset($queries->image_url) . "' width='60px'>";
            // })
            ->addColumn('name', function ($queries) {
               return Str::words($queries->brand_name, 10, '...');
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
            ->rawColumns(['action', 'status', 'image_url'])
            ->addIndexColumn()
            ->make(true);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }



   public function create(Request $request)
   {
      if ($request->ajax()) {

         $view = View::make('Car.Masters.Brand.create')->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

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
         $model = new CarBrand;
         $model->brand_name = $request->input('brand_name');
         $model->image_url = "";
         $model->status = 1;
         $model->save(); //
         return response()->json(['type' => 'success', 'message' => "Successfully Created"]);
      }
   }

   public function edit(Request $request, CarBrand $carBrand)
   {
      if ($request->ajax()) {


         $view = View::make('Car.Masters.Brand.edit', compact('carBrand'))->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }





   public function update(Request $request, CarBrand $carBrand)
   {
      if ($request->ajax()) {

         $rules = ['name' => 'required'];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
               'type' => 'error',
               'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {


            $model = CarBrand::findOrFail($carBrand->id);
            $model->name = $request->input('brand_name');

            $model->status = $request->input('status');
            $model->save(); //
            return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }


   public function destroy(Request $request, CarBrand $carBrand)
   {
      if ($request->ajax()) {


         $carBrand->delete();
         return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }
}
