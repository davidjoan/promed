<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\District;
use App\Models\Geo;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table('districts')->delete();
        $geo = Geo::getCountry('PE');
        $ruta = storage_path('app/public/geojson/peru_distrital_simple.geojson');
        $myfile = file_get_contents($ruta);
        $provincias = json_decode($myfile, true);
        foreach($provincias['features'] as $key => $district) {

            $department = Department::where('code', Str::substr( $district['properties']['IDDPTO'],0,2))->select('id')->first();
            $province = Province::where('code', Str::substr( $district['properties']['IDPROV'],0,4))->select('id')->first();
            
            District::create([
                'geo_id' => $geo->id,
                'department_id' => $department->id,
                'province_id' => $province->id,
                'code' => $district['properties']['IDDIST'],
                'name' => $district['properties']['NOMBDIST'],
                'department' => $district['properties']['NOMBDEP'],
                'province' => $district['properties']['NOMBPROV'],
                'capital' => $district['properties']['NOM_CAP'],
                'ha' => $district['properties']['AREA_MINAM'],
                'last_doc' => $district['properties']['DCTO'],
                'last_law' =>  $district['properties']['LEY'],
                'last_date'  => $district['properties']['FECHA'] == '-'?null:Carbon::createFromFormat('d/m/Y',substr($district['properties']['FECHA'],0,4) == 'EPOC'?'28/07/1821':$district['properties']['FECHA'])->format('Y-m-d'),
                'shape_length' =>  $district['properties']['SHAPE_LENG'],
                'shape_area' =>  $district['properties']['SHAPE_AREA'],
                'shape_length_1' =>  $district['properties']['SHAPE_LE_1'],
                'shape_area_1' =>  $district['properties']['SHAPE_AR_1'],
            ]);
        }
    }
}
