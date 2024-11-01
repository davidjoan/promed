<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\University;
use Maatwebsite\Excel\Concerns\ToModel;

class UniversityImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return University|null
    */
    public function model(array $row)
    {
        $university = University::create(array(
            'code' => $row[1],
            'name' => $row[2]
        ));
     
         return $university;
    }
}