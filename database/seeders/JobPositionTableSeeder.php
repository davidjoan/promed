<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\JobPosition;

use App\Models\Geo;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class JobPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_positions')->delete();

		$geo     = Geo::getCountry('PE');

        JobPosition::create(array('geo_id' => $geo->id,'code' => 'MG', 'name' => 'Medico General'));
        JobPosition::create(array('geo_id' => $geo->id,'code' => 'DM', 'name' => 'Director Médico' ));
        JobPosition::create(array('geo_id' => $geo->id,'code' => 'IN', 'name' => 'Internista'));
        JobPosition::create(array('geo_id' => $geo->id,'code' => 'SE', 'name' => 'Serum'));
        JobPosition::create(array('geo_id' => $geo->id,'code' => 'QF', 'name' => 'Quimico Farmaceútico'));
        JobPosition::create(array('geo_id' => $geo->id,'code' => 'TF', 'name' => 'Técnico en Farmácia'));
   
    }
}
