<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Specialty;
use Maatwebsite\Excel\Concerns\ToModel;

class SpecialtyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Specialty|null
    */
    public function model(array $row)
    {                
        $specialty = Specialty::create(array(
            'code' => $row[0],
            'name' => $row[1],
            'description' => $row['3']
        ));
     
         return $specialty;
    }
}
