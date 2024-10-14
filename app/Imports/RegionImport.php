<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Region;
use App\Models\Company;
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

        $company = Company::where('name', $row[2])->first();
        $geo     = Geo::getCountry('PE');
                
        $region = Region::create(array(
            'company_id' => $company->id,
            'geo_id' => $geo->id,
            'name' => $row[0]
        ));
     
         return $region;
    }
}
