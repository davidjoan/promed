<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Brick;
use App\Models\Region;
use App\Models\Company;
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
        $company = Company::where('name',$row[5])->first();
        $region  = Region::where('name',$row[4])->first();
        $geo     = Geo::getCountry('PE');
        
        $brick = Brick::create(array(
            'company_id' => $company->id,
            'region_id' => $region->id,
            'district_id' => $row[6],
            'geo_id' => $geo->id,
            'code' => $row[0],
            'name' => $row[1],
            'description' => $row[2],
            'geo_id' => $row[3]
        ));

        return $brick;
    }
}
