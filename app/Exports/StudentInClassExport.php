<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class StudentInClassExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection($classId)
    {
        // $students = User::join("student_classes", "users.student_id", "=", "student_classes.student_id")
        //     ->where("student_classes.class_id", $classId)
        //     ->select("users.student_id", "users.name", "gender", "birthday", "address", "phone")
        //     ->get();
        // foreach ($students as $student) {
        //     $student->gender = $student->gender == 1 ? "Nữ" : "Nam";
        // }
        // return $students;
    }
}
