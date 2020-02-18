<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Hash;
use DB;
use App\User;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $q = $request->input('q');
        $users = User::search($q)->paginate(5);
        return view('admin/students/index', compact("users", "q"));
    }

    public function create() 
    {
        return view('admin/students/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'student_id' => 'required:unique:users',
            'name' => 'required',
            'username' => 'required|unique:users',
            'birthday' => 'required',
            'email' => 'email|unique:users',
            'phone' => 'unique:users',
            'password' => 'required',
        ];
        $messages = [
    		'student_id.required' => 'Yêu cầu nhập họ tên',
    		'student_id.unique' => 'Mã sinh viên đã tồn tại',
    		'name.required' => 'Yêu cầu nhập họ tên',
            'username.required' => 'Yêu cầu nhập tên tài khoản',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'birthday.required' => 'Yêu cầu nhập ngày sinh',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Yêu cầu nhập mật khẩu',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            User::create([
                'student_id' => $request->input('student_id'),
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'gender' => $request->input('gender'),
                'birthday' => $request->input('birthday'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect('/admin/students')->with('success', "Thêm học viên thành công");    
        }
        return redirect('/admin/students')->with('error', "Thêm học viên không thành công");
    }

    public function edit($id)
    {
        $user = User::where("student_id", $id)->first();
        return view('admin/students/edit', compact('user'));
    }

    public function update(Request $request, $studentId)
    {
        $user = User::where("student_id", $studentId)->first();
        $rules = [
            'name' => 'required',
            'birthday' => 'required',
            'email' => ['email', Rule::unique('users')->ignore($user->id)],
            'phone' => [Rule::unique('users')->ignore($user->id)],
        ];
        $messages = [
    		'name.required' => 'Yêu cầu nhập họ tên',
            'birthday.required' => 'Yêu cầu nhập ngày sinh',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            $user->update($request->all());
            return redirect("/admin/students")->with("success", "Cập nhật thông tin thành công");
        }
        return redirect("/admin/students")->with("error", "Cập nhật thông tin không thành công");
    }

    public function destroy($id)
    {
        try {
            $user = User::where("student_id", $id)->first();
            $user->delete();
            return redirect('/admin/students')->with('success', "Xoá thành công");
        } catch (\Throwable $th) {
            return redirect('/admin/students')->with('error', "Xoá không thành công");
        }
    }
}
