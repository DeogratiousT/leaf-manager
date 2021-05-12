<?php

namespace App\Imports;

use App\Models\Grade;
use App\Models\Tobaccotype;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GradeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $grades = Grade::all();
        foreach ($grades as $grade) {
            if ($row['grade_name'] == $grade->grade_name) {
                return null;
            }   
        }

        $tobaccotypes = Tobaccotype::all();
        foreach ($tobaccotypes as $tobaccotype) {
            if ($row['tobacco_type_name'] != $tobaccotype->type_name) {
                return null;
            }
        }

        return new Grade([
            'grade_name'    => $row['grade_name'],
            'tobacco_type_name'     => $row['tobacco_type_name']
        ]);
    }
}
