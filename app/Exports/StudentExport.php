<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = User::all();
        foreach ($students as $student) {
            $student->gender = $student->gender == 1 ? "Nữ" : "Nam";
        }
        return $students;
    }
}
