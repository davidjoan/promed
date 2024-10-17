<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Hobby;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class HobbyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Hobby|null
    */
    public function model(array $row)
    {
        $geo     = Geo::getCountry('PE');
                
        $hobby = Hobby::create(array(
            'geo_id' => $geo->id,
            'code' => $row[0],
            'name' => $row[1]
        ));
     
         return $hobby;
    }
}