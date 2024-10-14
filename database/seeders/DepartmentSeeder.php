<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Geo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table('departments')->delete();

        $geo = Geo::getCountry('PE');

        $ruta = storage_path('app/public/geojson/peru_departamental_simple.geojson');
        $myfile = file_get_contents($ruta);
        $dptos = json_decode($myfile, true);
        foreach($dptos['features'] as $key => $dpto) {
            Department::create([
                'geo_id' => $geo->id,
                'code' => $dpto['properties']['FIRST_IDDP'],
                'name' => $dpto['properties']['NOMBDEP'],
                'ha' => $dpto['properties']['HECTARES'],
                'count'=> $dpto['properties']['COUNT'],
                ]);
        }
    }
}
