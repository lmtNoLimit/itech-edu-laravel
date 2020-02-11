<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash;
use App\User;

class StudentController extends Controller
{
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
        try {
            $data = request()->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'unique:users',
                'password' => 'required',
                'is_admin' => 'required'
            ]);
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'is_admin' => $data['is_admin']
            ]);
            return redirect('/admin/students')->with('success', "User successfully created");    
        } catch (\Throwable $th) {
            return redirect('/admin/students')->with('error', "Failed to create user"); 
        }
        
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin/students/edit', [
            'user' => $user
        ]);
    }

    public function update()
    {
        
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
