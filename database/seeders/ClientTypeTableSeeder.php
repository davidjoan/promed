<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Geo;
use App\Models\Company;
use App\Models\ClientType;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ClientTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_types')->delete();

        $company = Company::where('name','App1t')->first();
		$geo     = Geo::getCountry('PE');

        ClientType::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'DO', 'name' => 'Profesionales de Salud','description' => 'Health Care Proffesional'));
        ClientType::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'FA', 'name' => 'Profesionales comercializadores de Fármacos','description' => 'Drug Store Manager'));
		
    }
}
