<?php
namespace Database\Seeders;

use App\Models\Geo;
use App\Models\Company;
use Illuminate\Database\Seeder;
use App\Models\OrganizationType;
use Illuminate\Support\Facades\DB;

class OrganizationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$company = Company::where('name','App1t')->select('id')->first();
		$geo     = Geo::getCountry('PE');
        
		OrganizationType::create(['company_id' => $company->id,'geo_id' => $geo->id, 'name' => 'Filial']);
		OrganizationType::create(['company_id' => $company->id,'geo_id' => $geo->id, 'name' => 'Unidad de Negocio']);
		OrganizationType::create(['company_id' => $company->id,'geo_id' => $geo->id, 'name' => 'División']);
		OrganizationType::create(['company_id' => $company->id,'geo_id' => $geo->id, 'name' => 'Linea']);
		OrganizationType::create(['company_id' => $company->id,'geo_id' => $geo->id, 'name' => 'Supervisor']);
		OrganizationType::create(['company_id' => $company->id,'geo_id' => $geo->id, 'name' => 'Zona']);
    }
}
