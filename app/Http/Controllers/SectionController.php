<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseSection;
use App\Course;

class SectionController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $section = CourseSection::all();
        return view('admin/section/index', [
            'section' => $section
        ]);
    }

    public function create() 
    {
        $courses = Course::all();
        return view('admin/section/create', compact('courses'));
    }

    public function store(Request $request)
    {
        $rules = [
            'course_id' => 'required',
            'name' => 'required',
        ];
        $messages = [
    		'course_id.required' => 'Yêu cầu nhập mã khóa học',
    		'name.required' => 'Yêu cầu nhập tên khóa học',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            CourseSection::create($request->all());
            return redirect('/admin/section')->with('success', "Thêm thành công");    
        }
        return redirect('/admin/section')->with('error', "Thêm không thành công");
    }

    public function edit($courseId, $sectionId)
    {
        $section = Section::where("section_id", $section_id)->first();
        return view('admin/section/edit', [
            'section' => $section
        ]);
    }

    public function update(Request $request, $sectionId)
    {
        $rules = [
            'name' => 'required',
        
        ];

        $messages = [
            'name.required' => 'Yêu cầu nhập tên khóa học',
            
        ];

        $validator = validator()-> make($request->all(), $rules, $messages);
        
        if($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        } else {
            CourseSection::where("section_id", $sectionId)->update([
                'name' => $request->input('name'),
                
            ]);
            return redirect("/admin/section")->with("success", "Cập nhật thành công");
        }
        return redirect("/admin/section")->with("error", "Cập nhật không thành công");
    }

    public function destroy($sectionId)
    {
        try{
            CourseSection::find($sectionId)->delete();
            return redirect('/admin/section')->with('success', "Xoá thành công");
        } catch (\Throwable $th){
            return redirect('/admin/section')->with('error', "Xoá không thành công");
        }
    }
}
