<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\News;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $results = Result::all();
        return view('admin.result.index', compact('results'));
    }

    public function create()
    {
        // $classes = 
        // $subject = 
        return view('admin.results.create');
    }

    public function store()
    {

    }

    public function test()
    {
        $results = News::all();
        return view('result', compact('results'));
    }
}
