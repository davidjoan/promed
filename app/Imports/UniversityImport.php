<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Company;
use App\Models\University;
use Illuminate\Support\Collection;
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

        $company = Company::where('name', 'App1t')->first();
        $geo     = Geo::getCountry('PE');
                
        $university = University::create(array(
            'company_id' => $company->id,
            'geo_id' => $geo->id,
            'code' => $row[1],
            'name' => $row[2]
        ));
     
         return $university;
    }
}