<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $courses = Course::all();
        return view('admin/courses/index', [
            'courses' => $courses
        ]);
    }
    public function create() 
    {
        return view('admin/courses/create');
    }
    public function store()
    {
        $data = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'type' => 'required',
        ]);
        Course::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'type' => $data['type']
        ]);
        return redirect('/admin/courses')->with('success', "User successfully created");
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin/courses/edit', [
            'course' => $course
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
          'id' => 'required',
            'name' => 'required',
            'type' => 'required', 
        ];
        $messages = [
          'id.required' => 'nhập đủ',
          'name.required' => 'Yêu cầu nhập tên ngành',
          'type.required' => 'Yêu cầu nhập đầy đủ',
        ]; 
        $validtor = validator()-> make($request->all(),$rules,$messages);
        if($validtor->fails()){
          return redirect()->back()->withErrors($validtor)->withInput();
        }else{
          Course::where("id",$id)->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
          ]);
          return redirect("/admin/courses")->with("success", "Cập nhật thông tin thành công");
        }
        return redirect("/admin/courses")->with("error", "Cập nhật thông tin không thành công");
    }

    public function destroy($id)
    {
        try{
            $course = Course::find($id);
            $course ->delete();
            return redirect('/admin/courses')->with('success', "User successfully removed");
        } catch (\Throwable $th){
            return redirect('/admin/courses')->with('error', "Failed to remove user");
        }
    }

}
