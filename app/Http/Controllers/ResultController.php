<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class ResultController extends Controller
{
    public function index()
    {
        $results = ResultDetail::all();
        return view('admin.result.index', compact('results'));
    }

    public function import()
    {
        $data = Excel::import(new ResultsImport, request()->file('file'));
        // $path = $request->file('file')->getRealPath();

        // $data = Excel::load($path)->get();

        dd($data);

        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $insert_data[] = array(
                        'id'  => $row['id'],
                        'name'   => $row['name'],
                        'birthday'   => $row['birthday'],
                        'kt_thuong_xuyen'    => $row['kt_thuong_xuyen'],
                        'kt_dinh_ky'  => $row['kt_dinh_ky'],
                        'diem_tb'   => $row['diem_tb'],
                        'diem_thi'   => $row['diem_thi']
                    );
                }
            }
            // if(!empty($insert_data))
            // {
            //     DB::table('result_details')->insert($insert_data);
            // }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function test()
    {
        $address = public_path('storage/result/test.xlsx');
        $data = Excel::load($address, function($reader) {
            $results = $reader->get();
        })->get();
        dd($data);
    }
}