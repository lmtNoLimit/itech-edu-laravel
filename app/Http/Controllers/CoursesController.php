<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
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

    public function store(Request $request)
    {
        $rules = [
            'course_id' => 'required|unique:courses',
            'name' => 'required',
        ];
        $messages = [
    		'course_id.required' => 'Yêu cầu nhập mã khóa học',
    		'course_id.unique' => 'Mã khóa học đã tồn tại',
    		'name.required' => 'Yêu cầu nhập tên khóa học',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            Course::create($request->all());
            return redirect('/admin/courses')->with('success', "Thêm thành công");    
        }
        return redirect('/admin/courses')->with('error', "Thêm không thành công");
    }

    public function edit($course_id )
    {
        $courses = Course::where("course_id", $course_id)->first();
        return view('admin/courses/edit', [
            'courses' => $courses
        ]);
    }

    public function update(Request $request, $courseId)
    {
        $rules = [
            'name' => 'required',
        
        ];

        $messages = [
            'name.required' => 'Yêu cầu nhập tên khóa học',
            
        ];

        $validator = validator()-> make($request->all(), $rules, $messages);
        
        if($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Course::where("course_id", $courseId)->update([
                'name' => $request->input('name'),
                
            ]);
            return redirect("/admin/courses")->with("success", "Cập nhật thành công");
        }
        return redirect("/admin/courses")->with("error", "Cập nhật không thành công");
    }

    public function destroy($courseId)
    {
        try{
            Course::where("course_id", $courseId)->delete();
            return redirect('/admin/courses')->with('success', "Xoá thành công");
        } catch (\Throwable $th){
            return redirect('/admin/courses')->with('error', "Xoá không thành công");
        }
    }
}
