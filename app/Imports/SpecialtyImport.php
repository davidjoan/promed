<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Company;
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

        $company = Company::where('name', $row[2])->first();
        $geo     = Geo::getCountry('PE');
                
        $specialty = Specialty::create(array(
            'company_id' => $company->id,
            'geo_id' => $geo->id,
            'code' => $row[0],
            'name' => $row[1],
            'description' => $row['3']
        ));
     
         return $specialty;
    }
}
