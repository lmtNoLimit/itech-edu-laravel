<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Hash;
use DB;
use App\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return view("admin.documents.index");
    }

    public function create()
    {
        return view("admin.documents.create");
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'file' => 'mimes:docx',
        ];

        $messages = [
    		'name.required' => 'Tiêu đề không được để trống',
            'file.mimes' => "File không đúng định dạng",
        ];
        
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            $imagePath = $request->file('file')->store('uploads', 'public');
            Document::create([
                'name' => $request->input('name'),
                'file' => $imagePath,
                
            ]);
            return redirect('/admin/documents')->with('success', "Thêm thành công");    
        }
        return redirect('/admin/documents')->with('error', "Thêm không thành công");
    }
}
