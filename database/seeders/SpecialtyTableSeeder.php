<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\SpecialtyImport;
use App\Models\Company;
use App\Models\Geo;
use App\Models\Specialty;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SpecialtyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialties')->delete();

        $company = Company::where('name','App1t')->select('id')->first();
		$geo     = Geo::getCountry('PE');

        Specialty::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'PD', 'name' => 'Por Definir','description' => ''));

        Excel::import(new SpecialtyImport, storage_path('app/public/specialty.csv'));
    }
}
