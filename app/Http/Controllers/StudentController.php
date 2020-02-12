<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Hash;
use App\User;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin/students/index', [
            'users' => $users
        ]);
    }

    public function create() 
    {
        return view('admin/students/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users',
            'birthday' => 'required',
            'email' => 'email|unique:users',
            'phone' => 'unique:users',
            'password' => 'required',
        ];
        $messages = [
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
        $user = User::findOrFail($id);
        return view('admin/students/edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'birthday' => 'required',
            'email' => ['email', Rule::unique('users')->ignore($id)],
            'phone' => [Rule::unique('users')->ignore($id)],
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
            User::where("id", $id)->update([
                'name' => $request->input('name'),
                'birthday' => $request->input('birthday'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ]);
            return redirect("/admin/students")->with("success", "Cập nhật thông tin thành công");
        }
        return redirect("/admin/students")->with("error", "Cập nhật thông tin không thành công");
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect('/admin/students')->with('success', "User successfully removed");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/admin/students')->with('error', "Failed to remove user");
        }
    }
}
