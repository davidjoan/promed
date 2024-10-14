<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Hobby;
use App\Models\Company;
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

        $company = Company::where('name', 'App1t')->first();
        $geo     = Geo::getCountry('PE');
                
        $hobby = Hobby::create(array(
            'company_id' => $company->id,
            'geo_id' => $geo->id,
            'code' => $row[0],
            'name' => $row[1]
        ));
     
         return $hobby;
    }
}