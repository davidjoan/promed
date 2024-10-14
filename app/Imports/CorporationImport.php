<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Corporation;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\ToModel;

class CorporationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Corporation|null
    */
    public function model(array $row)
    {
		$corporation = Corporation::create([
           'name' => $row[0],
           'description' => $row[0]
        ]);
		
        return $corporation;
    }
}
