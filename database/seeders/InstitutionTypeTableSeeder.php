<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\InstitutionType;
use App\Models\Company;
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
        DB::disableQueryLog();
        DB::table('institution_types')->delete();

        $company = Company::where('name','App1t')->first();
		$geo     = Geo::getCountry('PE');

        InstitutionType::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'HO', 'name' => 'Hospital','description' => 'hospital'));
        InstitutionType::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'CL', 'name' => 'Clinica','description' => 'clinic' ));
        InstitutionType::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'CO', 'name' => 'Consultorio','description' => 'doctors'));
        InstitutionType::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'FA', 'name' => 'Farmacia','description' => 'pharmacy'));
        InstitutionType::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'DE', 'name' => 'Dental','description' => 'dentist'));
        InstitutionType::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'PD', 'name' => 'Por Definir','description' => ''));
    }
}
