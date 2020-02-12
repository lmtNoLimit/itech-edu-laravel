<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
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
        $data = request()->validate([
            'name' => 'required',
            'year' => 'required',
            'course_id' => 'required'
        ]);
        $messages = [
            'name.required' => 'Tên không được để trống',
            'year.required' => 'Năm học không được để trống',
            'course_id.required' => 'Mã khóa học không được',
        ];
        $vali = validator()->make($request->all(),$data,$messages);
        if ($vali->fails()) {
          return redirect()->back()->withErrors($vali)->withInput();
        }
        else{
          Classes::create([
            'name' => $data['name'],
            'year' => $data['year'],
            'course_id' => $data['course_id']
         ]);
         return \redirect('/admin/classes')->with('success',"Thêm lớp thành công");
        }
        return \redirect('/admin/classes')->with('error', "Thêm thất bại");
       
    }
    

    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        return view('admin/classes/edit', [
            'class' => $class
        ]);
    }

    public function update()
    {
        try {
            $class = Classes::where('id', $id)->first();
            $class->update([$request->all()]);
            dd($class);
        }
        catch(\Throwable $t) {
            return redirect('/admin/classes')->with('error', "Failed to update user");
        }
        dd($request->all());
    }

    public function destroy($id)
    {
        try{
            $class = Classes::find($id);
            $class->delete();
            return redirect('/admin/classes')->with('success' , "Classes successfully removed");

        }
        catch(\Thorowable $t){
            return redirect('/admin/clases')->with('error',"Faile to remove class");
        }

    }
}
