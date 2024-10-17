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
        $geo     = Geo::getCountry('PE');
                
        $university = University::create(array(
            'geo_id' => $geo->id,
            'code' => $row[1],
            'name' => $row[2]
        ));
     
         return $university;
    }
}