<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\StudentExport;

class ExcelController extends Controller
{
    public function index()
    {
        // $data = DB::table('')->orderBy('', 'ASC')->get();
        // return view('admin.result.index', \compact('data'));
    }

    public function import(Request $request)
    {
        // $request->
        // $rules = [
        //     'file' => 'required|mimes:xls,xlsx'
        // ];
        // $messages = [
        //     'file.required' => 'Yêu cầu chọn file',
        //     'file.mimes' => 'File không đúng định dạng',
        // ];
        // $path = $request->file('file')->getRealPath();
        // $data = Excel::load($path)->get();
        // if($data->count() > 0)
        // {
        //     foreach ($data->toArray() as $key => $value) {
        //         foreach ($value as $row) {
        //             $insert_data[] = array(
        //                 "student_id" => $row['student_id'],
        //                 "name" => $row['name'],

        //             );
        //         }
        //     }
        // }
    }

    public function exportStudentList()
    {
        return Excel::download(new StudentExport, 'DanhSachSinhVien.xlsx');
    }

    public function exportStudentsInClass()
    {
        return Excel::download(new StudentInClassExport, 'DanhSachSinhVien.xlsx');
    }
}
