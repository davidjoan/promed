<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Company;
use App\Models\Corporation;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\ToModel;

class CompanyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Company|null
    */
    public function model(array $row)
    {
        $Corporation = Corporation::where('name',$row[1])->first();

		$company = Company::create([
            'corporation_id' => $Corporation->id,
            'code' => $row[0],
            'name' => $row[2],
            'description' => $row[4],
            'closeup' => $row[4],
            'ddd' => $row[3]
        ]);

		$company->geos()->attach(Geo::getCountry($row[5]));
		
        return $company;
    }
}