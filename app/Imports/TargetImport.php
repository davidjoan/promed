<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Client;
use App\Models\Target;
use App\Models\Institution;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class TargetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Target|null
    */
    public function model(array $row)
    {
        $geo     = Geo::getCountry('PE');
        $client = Client::where('code', $row[0])->first();
        $institution = Institution::where('id', $row[1])->first();
        $target = Target::create(array(
            'geo_id' => $geo->id,
            'client_id' => $client->id,
            'institution_id' => $institution->id,
            'job_position_id' =>  $row[2],
            'specialty_id' => $row[3]
        ));
        return $target;
    }
}