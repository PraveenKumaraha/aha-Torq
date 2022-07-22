<?php

namespace App\Http\Controllers\Backend\Admin\Car\Masters;

use App\Models\CarBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarBodyType;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CarBodyTypeController extends Controller
{

   public function index()
   {
      
      return view('Car.Masters.BodyType.index');
   }
   public function getAllCarBodyTypes(Request $request)
   {

      if ($request->ajax()) {

         $queries = CarBodyType::orderby('created_at', 'desc')->get();

         return Datatables::of($queries)
            // ->addColumn('image_url', function ($queries) {
            //    return "<img src='" . asset($queries->image_url) . "' width='60px'>";
            // })
            ->addColumn('name', function ($queries) {
               return Str::words($queries->name, 10, '...');
            })
            ->addColumn('status', function ($queries) {
               return $queries->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In active</span>';
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

         $view = View::make('Car.Masters.BodyType.create')->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   public function store(Request $request)
   {
     

      $rules = ['name' => 'required'];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
         return response()->json([
            'type' => 'error',
            'errors' => $validator->getMessageBag()->toArray()
         ]);
      } else {
         $model = new CarBodyType;
         $model->name = $request->input('name');
       
         $model->status = 1;
         $model->save(); //
         return response()->json(['type' => 'success', 'message' => "Successfully Created"]);
      }
   }

   public function edit(Request $request, CarBodyType $carBodyType)
   {
      if ($request->ajax()) {


         $view = View::make('Car.Masters.BodyType.edit', compact('carBodyType'))->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }





   public function update(Request $request, CarBodyType $carBodyType)
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


            $model = CarBodyType::findOrFail($carBodyType->id);
            $model->name = $request->input('name');

            $model->status = $request->input('status');
            $model->save(); //
            return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }


   public function destroy(Request $request, CarBodyType $carBodyType)
   {
      if ($request->ajax()) {


         $carBodyType->delete();
         return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }
}
