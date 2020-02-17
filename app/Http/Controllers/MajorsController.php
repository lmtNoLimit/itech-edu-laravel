<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Majors;
use App\Classes;

class MajorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $majors = Majors::all();
        return view('admin/majors/index', [
            'majors' => $majors
        ]);
    }

    public function create() 
    {
        return view('admin/majors/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'majors_id' => 'required|unique:majors',
            'name' => 'required',
            'type_of_education' => 'required',
        ];
        $messages = [
    		'majors_id.required' => 'Yêu cầu nhập mã ngành',
    		'majors_id.unique' => 'Mã ngành đã tồn tại',
    		'name.required' => 'Yêu cầu nhập tên ngành',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            Majors::create($request->all());
            return redirect('/admin/majors')->with('success', "Thêm thành công");    
        }
        return redirect('/admin/majors')->with('error', "Thêm không thành công");
    }

    public function edit($majors_id)
    {
        $majors = Majors::where("majors_id", $majors_id)->first();
        return view('admin/majors/edit', [
            'majors' => $majors
        ]);
    }

    public function update(Request $request, $majorsId)
    {
        $rules = [
            'name' => 'required',
            'type_of_education' => 'required', 
        ];

        $messages = [
            'name.required' => 'Yêu cầu nhập tên ngành',
            'type_of_education.required' => 'Yêu cầu nhập đầy đủ',
        ];

        $validator = validator()-> make($request->all(), $rules, $messages);
        
        if($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Majors::where("majors_id", $majorsId)->update([
                'name' => $request->input('name'),
                'type_of_education' => $request->input('type_of_education'),
            ]);
            return redirect("/admin/majors")->with("success", "Cập nhật thành công");
        }
        return redirect("/admin/majors")->with("error", "Cập nhật không thành công");
    }

    public function destroy($majorsId)
    {
        try{
            Classes::where("majors_id", $majorsId)->delete();
            Majors::where("majors_id", $majorsId)
                ->first()
                ->delete();
            return redirect('/admin/majors')->with('success', "Xoá thành công");
        } catch (\Throwable $th){
            return redirect('/admin/majors')->with('error', "Xoá không thành công");
        }
    }

}
