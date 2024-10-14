<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Company;
use App\Models\Institution;
use App\Models\InstitutionType;
use Maatwebsite\Excel\Concerns\ToModel;

class InstitutionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Institution|null
    */
    public function model(array $row)
    {
        $geo     = Geo::getCountry('PE');
		$company = Company::where('name','App1t')->first();
        $institution_type = InstitutionType::where('name',$row[3])->first();
        
        $institution = Institution::create(array(
            'company_id' => $company->id,
			'geo_id' => $geo->id,
			'institution_type_id' => (!blank($institution_type))?$institution_type->id:null,
            'code' => $row[0],
            'name' => $row[1],
            'description' => $row[2]
        ));

        return $institution;
    }
}