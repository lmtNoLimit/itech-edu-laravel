<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;

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
        return view('admin/classes/create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        return view('admin/classes/edit');
    }

    public function update()
    {

    }

    public function destroy($id)
    {

    }
}
