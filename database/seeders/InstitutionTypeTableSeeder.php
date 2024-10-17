<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\InstitutionType;

use App\Models\Geo;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InstitutionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institution_types')->delete();
		$geo     = Geo::getCountry('PE');

        InstitutionType::create(array('geo_id' => $geo->id,'code' => 'HO', 'name' => 'Hospital','description' => 'hospital'));
        InstitutionType::create(array('geo_id' => $geo->id,'code' => 'CL', 'name' => 'Clinica','description' => 'clinic' ));
        InstitutionType::create(array('geo_id' => $geo->id,'code' => 'CO', 'name' => 'Consultorio','description' => 'doctors'));
        InstitutionType::create(array('geo_id' => $geo->id,'code' => 'FA', 'name' => 'Farmacia','description' => 'pharmacy'));
        InstitutionType::create(array('geo_id' => $geo->id,'code' => 'DE', 'name' => 'Dental','description' => 'dentist'));
    }
}
