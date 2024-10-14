<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Geo;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $geo = Geo::getCountry('PE');
        $ruta = storage_path('app/public/geojson/peru_provincial_simple.geojson');
        $myfile = file_get_contents($ruta);
        $provincias = json_decode($myfile, true);
        foreach($provincias['features'] as $key => $provincia) {
            $department = Department::where('code', Str::substr( $provincia['properties']['FIRST_IDPR'],0,2))->select('id')->first();
            
            Province::create([
                'geo_id' => $geo->id,
                'department_id' => $department->id,
                'code' => $provincia['properties']['FIRST_IDPR'],
                'name' => $provincia['properties']['NOMBPROV'],
                'department' => $provincia['properties']['FIRST_NOMB'],
                'ha' => $provincia['properties']['ha'],
                'count'=> $provincia['properties']['COUNT'],
                'last_doc' => $provincia['properties']['LAST_DCTO'],
                'last_law' =>  $provincia['properties']['LAST_LEY'],
                'first_date' => $provincia['properties']['FIRST_FECH'] == '-'?null:Carbon::createFromFormat('d/m/Y',substr($provincia['properties']['FIRST_FECH'],0,4) == 'EPOC'?'28/07/1821':$provincia['properties']['FIRST_FECH'])->format('Y-m-d'),
                'last_date'  => $provincia['properties']['LAST_FECHA'] == '-'?null:Carbon::createFromFormat('d/m/Y',substr($provincia['properties']['LAST_FECHA'],0,4) == 'EPOC'?'28/07/1821':$provincia['properties']['LAST_FECHA'])->format('Y-m-d'),
                'min_shape' =>  $provincia['properties']['MIN_SHAPE_'],
            ]);
        }
    }
}
