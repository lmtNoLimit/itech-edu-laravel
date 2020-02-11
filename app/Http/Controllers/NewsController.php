<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin/news/index');
    }

    public function create()
    {
        return view('admin/news/create');
    }

    public function store()
    {

    }

    public function edit()
    {
        return view('admin/news/edit');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
