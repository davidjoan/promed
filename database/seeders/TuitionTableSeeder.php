<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Tuition;
use App\Models\Company;
use App\Models\Geo;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TuitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tuitions')->delete();

        $company = Company::where('name','App1t')->first();
		$geo     = Geo::getCountry('PE');

        Tuition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'CMP', 'name' => 'Colegio Médica del Perú','description' =>'Doctor'));
        Tuition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'COP1', 'name' => 'Colegio de Obstetras del Perú','description' => 'Obstetra'));
        Tuition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'COP2', 'name' => 'Colegio de Odontologos del Perú', 'description' => 'Odontólogo'));
        Tuition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'CQP' , 'name' => 'Colegio de Quimicos Farmaceuticos del Perú','description' => 'QF'));
        Tuition::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'COS' , 'name' => 'Cosmiatras','description' => 'Cosmiatra'));
   
    }
}