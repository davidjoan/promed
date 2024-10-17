<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Region;
use Maatwebsite\Excel\Concerns\ToModel;

class RegionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Region|null
    */
    public function model(array $row)
    {
        $geo     = Geo::getCountry('PE');
                
        $region = Region::create(array(
            'geo_id' => $geo->id,
            'name' => $row[0]
        ));
     
         return $region;
    }
}
