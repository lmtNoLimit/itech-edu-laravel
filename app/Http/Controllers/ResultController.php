<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\News;
use App\Classes;
use App\Subject;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $results = Result::all();
        foreach ($results as $result) {
            $class = Classes::where("class_id", $result->class_id)->first();
            $subject = Subject::where("subject_id", $result->subject_id)->first();
            $result->class_name = $class->name;
            $result->subject_name = $subject->name;
        }
        return view('admin.results.index', compact('results'));
    }

    public function create()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        return view('admin.results.create', compact("classes", "subjects"));
    }

    public function store(Request $request)
    {
        $rules = [
            'class_id' => 'required',
            'subject_id' => 'required',
            'content' => 'required',
        ];

        $messages = [
    		'class_id.required' => 'Mã lớp không được để trống',
    		'subject_id.required' => 'Mã môn không được để trống',
            'content.required' => 'Nội dung tin không được để trống',
        ];
        
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            Result::create([
                'class_id' => $request->input('class_id'),
                'subject_id' => $request->input('subject_id'),
                'content' => $request->input('content'),
            ]);
            return redirect('/admin/results')->with('success', "Cập nhật bảng điểm thành công");    
        }
        return redirect('/admin/results')->with('error', "Cập nhật bảng điểm không thành công");
    }

    public function destroy($id)
    {
        try{
            $result = Result::find($id);
            $result->delete();
            return \redirect('/admin/result')->with('success', "Xoá kết quả thành công");
        } catch(Throwable $th){
            return \redirect('/admin/news')->with('error', "Xoá tin không thành công");
        }
    }
}