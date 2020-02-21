<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
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
        return view('admin/news/index', compact('news'));
    }

    public function create()
    {
        return view('admin/news/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
            'content' => 'required',
            'type' => 'required',
        ];

        $messages = [
    		'title.required' => 'Tiêu đề không được để trống',
    		'description.required' => 'Yêu cầu nhập mô tả',
            'image.image' => "Ảnh không đúng định dạng",
            'content.required' => 'Nội dung tin không được để trống',
            'type.required' => 'Thể loại tin tức không được để trống',
        ];
        
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            $imagePath = $request->file('image')->store('uploads', 'public');
            News::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title'), '-'),
                'description' => $request->input('description'),
                'image' => $imagePath,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'type' => $request->input('type'),
            ]);
            return redirect('/admin/news')->with('success', "Thêm tin tức thành công");    
        }
        return redirect('/admin/news')->with('error', "Thêm tin tức không thành công");
    }
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin/news/edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'content' => 'required',
            'type' => 'required',
        ];
        $messages = [
    		'title.required' => 'Tiêu đề không được để trống',
    		'description.required' => 'Mô tả không được để trống',
    		'image.required' => 'Yêu cầu thêm ảnh',
    		'image.image' => 'Ảnh không đúng định dạng',
            'content.required' => 'Nội dung tin không được để trống',
            'type.required' => 'Thể loại tin tức không được để trống',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            $imagePath = $request->file('image')->store('uploads', 'public');
            News::where("id", $id)->update([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title'), "-"),
                'description' => $request->input('description'),
                'image' => $imagePath,
                'content' => $request->input('content'),
                'type' => $request->input('type'),
            ]);
            return redirect('/admin/news')->with('success', "Sửa tin tức thành công");    
        }
        return redirect('/admin/news')->with('error', "Sửa tin tức không thành công");
    }

    public function destroy($id)
    {
        try {
            $news = News::find($id);
            $news->delete();
            return \redirect('/admin/news')->with("success", "Xoá tin thành công");
        } catch (\Throwable $th) {
            return \redirect('/admin/news')->with("error", "Xoá tin không thành công");
        }
    }
}
