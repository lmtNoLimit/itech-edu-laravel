<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Registration;

class RegistrationController extends Controller
{
    

    public function index()
    {
        $registrations = Registration::all();
        return view('admin/registrations/index', compact('registrations'));
    }

    public function create()
    {
        return view('/formtest');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'email|unique:registrations',
            'phone' => 'unique:users',
            'type_of_education' => 'required',
            'majors_id' => 'required',
        ];
        $messages = [
        
            'name.required' => 'Yêu cầu nhập họ tên',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'type_of_education' =>'nhập đầy đủ',
            'majors_id' => 'Yêu cầu nhập ngành',
        ];
        $validator = validator()->make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Registration::create([
                'name' => $request->input('name'), 
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'type_of_education' => $request->input('type_of_education'),
                'majors_id' => $request -> input('majors_id'),
            ]);
            return redirect('/')->with('success-message', 'Cảm ơn đã đăng ký');
        }
        return redirect('/')->with('error-message', 'Đã có lỗi xảy ra');
    }
}
  