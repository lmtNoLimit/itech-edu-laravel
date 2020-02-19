<?php

namespace App\Imports;

use App\ResultDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class ResultsImport implements WithMappedCells, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function mapping(): array
    {
        return [
            'id' => 'B4',
            'name' => 'C4',
            'birthday' => 'E4', 
            'kt_thuong_xuyen' => 'p4', 
            'kt_dinh_ky' => 'Q4', 
            'diem_tb' => 'R4', 
            'diem_thi' => 'S4',
        ];
    }

    public function model(array $row)
    {
        return new ResultDetail([
            'id' => $row['id'],
            'name' => $row['name'],
            'birthday' => $row['birthday'],
            'kt_thuong_xuyen' => $row['kt_thuong_xuyen'],
            'kt_dinh_ky' => $row['kt_dinh_ky'], 
            'diem_tb' => $row['diem_tb'],
            'diem_thi' => $row['diem_thi'], 
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
