<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $news = News::all();
        return view('admin/news/index', [
            'news' => $news
        ]);
    }

    public function create()
    {
        return view('admin/news/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
        ];
        $messages = [
    		'title.required' => 'Tiêu đề không được để trống',
            'content.required' => 'Nội dung tin không được để trống',
            'type.required' => 'Thể loại tin tức không được để trống',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            News::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'type' => $request->input('type'),
            ]);
            return redirect('/admin/news')->with('success', "Thêm tin tức thành công");    
        }
        return redirect('/admin/news')->with('error', "Thêm tin tức không thành công");
    }

    public function edit($id)
    {
        return view('admin/news/edit');
    }

    public function update()
    {

    }

    public function destroy($id)
    {

    }
}
