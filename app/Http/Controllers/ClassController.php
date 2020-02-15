<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Classes;
use App\Course;
use App\User;
use App\StudentClass;

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
        $courses = Course::all();
        return view('admin/classes/create', [
            'courses' => $courses
        ]);
    }

    public function getAddStudent($classId){
        $studentIds = StudentClass::select("student_id")->get();
        $students = User::whereNotIn("users.id", $studentIds)->get();
        $class = Classes::where("slug", $classId)->first();
        return view("admin/classes/addStudent", [
            'students' => $students,
            'class' => $class
        ]);
    }

    public function postAddStudent(Request $request, $classId){
        // dd($studentId, $classId);
        $classId = $request->input("class_id");
        StudentClass::create([
            'class_id' => $classId,
            'student_id' => $request->input('student_id')
        ]);
        return redirect("/admin/classes/$classId/addStudent")->with("success", "Thêm thành công");
    }

    public function show($classId){
        $students = User::join("student_classes", "users.id", "=", "student_id")
            ->join("classes", "classes.slug", "=", "class_id")
            ->where("class_id", $classId)
            ->select("users.id", "users.name", "gender", "birthday", "address", "phone")
            ->get();
        $class = Classes::where("slug", $classId)->first();
        return view("admin/classes/show", [
            'students' => $students,
            'class' => $class
        ]);
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
