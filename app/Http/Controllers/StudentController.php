<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
