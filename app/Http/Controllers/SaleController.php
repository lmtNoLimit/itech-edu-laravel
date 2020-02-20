<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sale;
use App\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SaleController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
      $sales = DB::table('sales')->get();
      foreach ($sales as $item) {
        $course = Course::where("course_id", $item->course_id)->first();
        // dd($course);
        // $item->course_name = $course->name;
      }
      // $courses = 
      return view('admin/sales/index', [
          'sales' => $sales
      ]);
  }
  public function create()
    {
      $courses = Course::all();
      return view('admin/sales/create', compact('courses'));
    }

    public function store(Request $request)
    {
      $rules = [
        'course_id' => 'required',
        'from_date' => 'required',
        'to_date' => 'required'
      ];
      
      $messages = [
        'course_id.required' => 'Tên ưu ngành đãi không được để trống',
        'from_date.required' => 'Không được để trống',
        'to_date.required' => 'Không được để trống'
      ];
      
      $validator = validator()->make($request->all(), $rules, $messages);
      
      if ($validator->fails()) {
        dd($validator);
        return redirect()->back()->withErrors($validator)->withInput(); 
    	} else {

            Sale::create($request->all());
            return redirect('/admin/sales')->with('success', "Thêm ưu đãi thành công");    
          }
          return redirect('/admin/sales')->with('error', "Thêm ưu đãi không thành công");    
    }

    public function destroy($id)
    {
        try {
            $sales = Sale::where("course_id", $id)->first();
            $sales->delete();
            return redirect('/admin/sales')->with('success', "Xoá thành công");
        } catch (\Throwable $th) {
            return redirect('/admin/sales')->with('error', "Xoá không thành công");
        }
    }

}
