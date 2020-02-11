<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin/classes/index');
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
