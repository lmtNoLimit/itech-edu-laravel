<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'gender' => '',
            'birthday' => 'required',
            'address' => 'min:2',
            'email' => 'unique:users',
            'phone' => 'unique:users',
            'password' => 'required',
        ]);
        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('/admin/students')->with('success', "User successfully created");    
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
        try {
            // $data = request()->validate([
            //     'name' => 'required',
            //     'username' => 'required|unique:users',
            //     'gender' => '',
            //     'birthday' => 'required',
            //     'address' => 'min:2',
            //     'email' => 'unique:users',
            //     'phone' => 'unique:users',
            // ]);
            // User::where('id', $id)->update($request->all());
            // return redirect('/admin/students')->with(success, "User successfully updated");
            $student = User::where('id', $id)->first();
            $student->update([$request->all()]);
            dd($student);
        } catch (\Throwable $th) {
            return redirect('/admin/students')->with('error', "Failed to update user");
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect('/admin/students')->with('success', "User successfully removed");
        } catch (\Throwable $th) {
            return redirect('/admin/students')->with('error', "Failed to remove user");
        }
    }
}
