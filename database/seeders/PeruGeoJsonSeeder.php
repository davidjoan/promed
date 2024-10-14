<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Geo;
use App\Models\Institution;
use App\Models\InstitutionType;
use Illuminate\Support\Facades\DB;
use TarfinLabs\LaravelSpatial\Types\Point;

use Illuminate\Support\Str;

class PeruGeoJsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::where('name','App1t')->first();
		$country = Geo::getCountry('PE');
        $peru    = Institution::where('name','Perú')->first();
        $faker   = \Faker\Factory::create();
        
        $ruta = storage_path('app').'\public\geojson\peru-healthsites.geojson';
        $myfile = file_get_contents($ruta);
        $geos = json_decode($myfile, true);
        foreach($geos['features'] as $key => $geo) {
            $institution_type = InstitutionType::where('description', $geo['properties']['amenity'])->first();
            $lineString = array();
            $polygon = null;
            $point = null;
            $latitude = null;
            $longitude = null;

            switch ($geo['geometry']['type']) {
                case 'Point':
                    $latitude = $geo['geometry']['coordinates'][1];
                    $longitude = $geo['geometry']['coordinates'][0];
                    $point  = new Point(lat:$latitude,lng:  $longitude, srid: 4326);
                    break;
            }

            $institution = Institution::create(['company_id' => $company->id,
            'geo_id' => $country->id,
            'institution_type_id' => $institution_type->id,
            'brick_id' => null,
            'name' => Str::of($geo['properties']['name']) ,'ruc' => null,'code' => null,
            'address' => Str::of($geo['properties']['addr_street'])->append($geo['properties']['addr_housenumber'])->append($geo['properties']['addr_city']),
            'latitude' => $latitude,'longitude' => $longitude,
            'area' => $polygon,'location' => $point,
            'osm_id' => Str::of($geo['properties']['osm_id']),
            'osm_type' => Str::of($geo['properties']['osm_type']),
            'contact_number' => Str::of($geo['properties']['contact_number']),
            'uuid' => Str::of($geo['properties']['uuid']),
            'emergency' => ($geo['properties']['emergency'] == 'yes')? true:false,
            'wheelchair' => ($geo['properties']['wheelchair'] == 'yes')? true:false,
            'website' =>$faker->url(),
            'fanpage' => $faker->url(),
            'operator' => Str::of($geo['properties']['operator']),
            'operator_type' => Str::of($geo['properties']['operator_type'])
            ]);
        }
    }
}
