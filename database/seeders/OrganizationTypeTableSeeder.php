<?php
namespace Database\Seeders;

use App\Models\Geo;

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
		$geo     = Geo::getCountry('PE');
        
		OrganizationType::create(['geo_id' => $geo->id, 'name' => 'Filial', 'active' => 0]);
		OrganizationType::create(['geo_id' => $geo->id, 'name' => 'Unidad de Negocio', 'active' => 0]);
		OrganizationType::create(['geo_id' => $geo->id, 'name' => 'División', 'active' => 0]);
		OrganizationType::create(['geo_id' => $geo->id, 'name' => 'Linea', 'active' => 0]);
		OrganizationType::create(['geo_id' => $geo->id, 'name' => 'Supervisor', 'active' => 0]);
		OrganizationType::create(['geo_id' => $geo->id, 'name' => 'Zona', 'active' => 0]);
    OrganizationType::create(['geo_id' => $geo->id, 'name' => 'Area de Trabajo', 'active' => 1]);
    }
}
