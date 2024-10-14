<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\JobPosition;
use App\Models\Company;
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

        $company = Company::where('name','App1t')->first();
		$geo     = Geo::getCountry('PE');

        JobPosition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'MG', 'name' => 'Medico General'));
        JobPosition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'DM', 'name' => 'Director Médico' ));
        JobPosition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'IN', 'name' => 'Internista'));
        JobPosition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'SE', 'name' => 'Serum'));
   
    }
}
