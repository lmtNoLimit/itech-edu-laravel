<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Classes;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $classes = Classes::all();
        return view('admin/classes/index', [
            'classes' => $classes
        ]);
    }

    public function create()
    {
        return view('admin/classes/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'slug' => 'required|unique:classes',
            'name' => 'required',
            'year' => 'required',
            'course_id' => 'required'
        ];
        $messages = [
            'slug.unique' => "Mã lớp đã tồn tại",
            'slug.required' => "Yêu cầu nhập mã lớp",
            'name.required' => 'Tên không được để trống',
            'year.required' => 'Năm học không được để trống',
            'course_id.required' => 'Mã khóa học không được',
        ];
        $validator = validator()->make($request->all(), $rules, $messages);
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Classes::create([
                'slug' => $request->input('slug'),
                'name' => $request->input('name'),
                'year' => $request->input('year'),
                'course_id' => $request->input('course_id')
            ]);
            return redirect('/admin/classes')->with('success',"Thêm lớp thành công");
        }
        return redirect('/admin/classes')->with('error', "Thêm thất bại");
    }
    

    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        return view('admin/classes/edit', [
            'class' => $class
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'year' => 'required',
            'course_id' => 'required'
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'year.required' => 'Năm học không được để trống',
            'course_id.required' => 'Mã khóa học không được',
        ];
        $validator = validator()->make($request->all(), $rules, $messages);
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Classes::where("id", $id)->update([
                'name' => $request->input('name'),
                'year' => $request->input('year'),
                'course_id' => $request->input('course_id')
            ]);
            return redirect('/admin/classes')->with('success',"Cập nhật lớp thành công");
        }
        return redirect('/admin/classes')->with('error', "Cập nhật lớp không thành công");
    }

    public function destroy($id)
    {
        try {
            $class = Classes::find($id);
            $class->delete();
            return redirect('/admin/classes')->with('success' , "Classes successfully removed");
        }
        catch(\Thorowable $t){
            return redirect('/admin/clases')->with('error',"Faile to remove class");
        }
    }

}
