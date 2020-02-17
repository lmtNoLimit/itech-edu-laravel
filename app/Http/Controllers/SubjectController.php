<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Subject;
class SubjectController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  
  public function index()
  {
      $subjects = Subject::all();
      
      return view('admin/subjects/index', [
        'subjects' => $subjects
      ]);
  }
  public function create() 
  {
      return view('admin/subjects/create');
  }
  public function store(Request $request)
  {
      $rules = [
          'subject_id' => 'required',
          'name' => 'required',
      ];
      $messages = [
          'subject_id.required' => 'Yêu cầu nhập mã môn học',
          'name.required' => 'yêu cầu nhập tên môn học',
    ];
      $validator = validator()->make($request->all(), $rules, $messages);
      
      if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    } else {
          Subject::create([
              'subject_id' => $request->input('subject_id'),     
              'name' => $request->input('name'),         
          ]);
           return redirect('/admin/subjects')->with('success', "Thêm môn học thành công");    
      }
      return redirect('/admin/subjects')->with('error', "Thêm môn học không thành công");
  }
  public function edit($id)
  {
      $subject = Subject::where("subject_id", $id)->first();
      return view('admin/subjects/edit', [
          'subject' => $subject
      ]);
  }
  public function update(Request $request, $subjectId)
  {
      $rules = [
          'subject_id' =>'required',
          'name' => 'required'
      ];
      $messages = [
          'subject_id.required' => 'Yêu cầu nhập mã môn học',
          'name.required' => 'Yêu cầu nhập tên môn học',
      ];
      $validator = validator()->make($request->all(), $rules, $messages);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      } else {
          Subject::where("subject_id", $subjectId)->update([
              'subject_id' => $request->input('subject_id'),
              'name' => $request->input('name'),
          ]);
          return redirect('/admin/subjects')->with('success',"Cập nhật môn học thành công");
      }
      return redirect('/admin/subjects')->with('error', "Cập nhật môn học không thành công");
  }
  public function destroy($subjectId)
  {
      try{
          $subjects = Subject::find($subjectId);
          $subjects->delete();
          return redirect('/admin/subjects')->with('success', "Xoá thành công");
      } catch (\Throwable $th){
          return redirect('/admin/subjects')->with('error', "Xoá không thành công");
      }
  }
}
