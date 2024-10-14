<?php

namespace Database\Seeders;
use App\Models\Department;
use App\Models\Geo;
use App\Models\Province;
use App\Models\ProvinceCapital;
use Illuminate\Support\Facades\DB;
use TarfinLabs\LaravelSpatial\Types\Point;
use Illuminate\Database\Seeder;

class ProvinceCapitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table('province_capitals')->delete();
        $geo = Geo::getCountry('PE');
        $ruta = storage_path('app/public/geojson/peru_capital_provincia.geojson');
        $myfile = file_get_contents($ruta);
        $provincias = json_decode($myfile, true);
        foreach($provincias['features'] as $district) {

            $department = Department::where('name', $district['properties']['DEPARTAM'])->select('id')->first();
            $province = Province::where('name', $district['properties']['PROVINCIA'])->select('id')->first();
        
            ProvinceCapital::create([
                'geo_id' => $geo->id,
                'department_id' => $department->id,
                'province_id' => $province->id,
                'capital' => $district['properties']['CAPITAL'],
                'province' => $district['properties']['PROVINCIA'],
                'district' => $district['properties']['DISTRITO'],
                'department' => $district['properties']['DEPARTAM'],
                'classification' => $district['properties']['CLASIF02'],
                'category' => $district['properties']['NOMCAT02'],
                'location' => new Point($district['geometry']['coordinates'][1],$district['geometry']['coordinates'][0])]);
        }
    }
}
