<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Classes;
use App\Majors;
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
        $majors = Majors::all();
        return view('admin/classes/create', [
            'majors' => $majors
        ]);
    }

    public function getAddStudent($classId){
        $studentIds = StudentClass::select("student_id")->get();
        $students = User::whereNotIn("users.id", $studentIds)->get();
        $class = Classes::where("class_id", $classId)->first();
        return view("admin/classes/addStudent", [
            'students' => $students,
            'class' => $class
        ]);
    }

    public function postAddStudent(Request $request, $classId){
        $classId = $request->input("class_id");
        StudentClass::create([
            'class_id' => $classId,
            'student_id' => $request->input('student_id')
        ]);
        return redirect("/admin/classes/$classId/addStudent")->with("success", "Thêm thành công");
    }

    public function show($classId){
        $students = User::join("student_classes", "users.id", "=", "student_id")
            ->join("classes", "classes.class_id", "=", "student_classes.class_id")
            ->where("classes.class_id", $classId)
            ->select("users.id", "users.name", "gender", "birthday", "address", "phone")
            ->get();
        $class = Classes::where("class_id", $classId)->first();
        return view("admin/classes/show", [
            'students' => $students,
            'class' => $class
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'class_id' => 'required|unique:classes',
            'name' => 'required',
            'year' => 'required',
            'majors_id' => 'required'
        ];
        $messages = [
            'class_id.unique' => "Mã lớp đã tồn tại",
            'class_id.required' => "Yêu cầu nhập mã lớp",
            'name.required' => 'Tên không được để trống',
            'year.required' => 'Năm học không được để trống',
            'majors_id.required' => 'Mã khóa học không được',
        ];
        $validator = validator()->make($request->all(), $rules, $messages);
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Classes::create([
                'class_id' => $request->input('class_id'),
                'name' => $request->input('name'),
                'year' => $request->input('year'),
                'majors_id' => $request->input('majors_id')
            ]);
            return redirect('/admin/classes')->with('success',"Thêm lớp thành công");
        }
        return redirect('/admin/classes')->with('error', "Thêm thất bại");
    }
    

    public function edit($id)
    {
        $class = Classes::where("class_id", $id)->first();
        return view('admin/classes/edit', [
            'class' => $class
        ]);
    }

    public function update(Request $request, $classId)
    {
        $rules = [
            'name' => 'required',
            'year' => 'required',
            'majors_id' => 'required'
        ];
        $messages = [
            'name.required' => 'Yêu cầu nhập tên lớp',
            'year.required' => 'Yêu cầu nhập năm học',
            'majors_id.required' => 'Mã khóa học không được',
        ];
        $validator = validator()->make($request->all(), $rules, $messages);
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Classes::where("class_id", $classId)->update([
                'name' => $request->input('name'),
                'year' => $request->input('year'),
                'majors_id' => $request->input('majors_id')
            ]);
            return redirect('/admin/classes')->with('success',"Cập nhật lớp thành công");
        }
        return redirect('/admin/classes')->with('error', "Cập nhật lớp không thành công");
    }

    public function destroy($id)
    {
        try {
            $class = Classes::where("class_id", $id)->first();
            $class->delete();
            return redirect('/admin/classes')->with('success' , "Xoá lớp học thành công");
        }
        catch(\Thorowable $t){
            return redirect('/admin/clases')->with('error',"Xoá lớp không thành công");
        }
    }

}
