<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Brick;
use Maatwebsite\Excel\Concerns\ToModel;

class BrickImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Brick|null
    */
    public function model(array $row)
    {
        $geo     = Geo::getCountry('PE');
        
        $brick = Brick::create(array(
            'district_id' => $row[3],
            'geo_id' => $geo->id,
            'code' => $row[0],
            'name' => $row[1],
            'description' => $row[2]
        ));

        return $brick;
    }
}
