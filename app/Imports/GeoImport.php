<?php

namespace App\Imports;

use App\Models\Geo;
use App\Models\Brick;
use App\Models\Region;
use Maatwebsite\Excel\Concerns\ToModel;
use TarfinLabs\LaravelSpatial\Types\Point;

class GeoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Geo|null
    */
    public function model(array $row)
    {
        $geo = new Geo(array(
            'id' => $row[0],
            'name' => $row[1],
            'level' => $row[4],
            'country' => $row[5],
            'a1code' =>  $row[6],
            'a2code' => $row[7],
            'a3code' => $row[8],
            'population' => $row[9],
            'timezone' => $row[10],
            'location' => new Point($row[2],$row[3])
        ));
        if($row[11] === 'root') {
            $geo->saveAsRoot();
        }else{
            $parent = Geo::where('id','=',$row[11])->first();
            $geo->parent()->associate($parent)->save();
        }
        return $geo;
    }
}
