<?php
namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Geo;
use App\Models\Company;
use App\Models\Campaign;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Carbon::setLocale('es');
        
        DB::table('campaigns')->delete();

        $company = Company::where('name', 'App1t')->select('id')->first();
        $geo     = Geo::getCountry('PE');
        $organization = Organization::where('name', 'Marketing')->first();
        
        $months = 60;
        $months_2_years = 24;
        for ($counter = 0; $counter < $months; $counter++) {

            $datetime = Carbon::now()->addMonth(-1*$counter);

            Campaign::create(['company_id' => $company->id,
                'geo_id' => $geo->id,
                'organization_id' => $organization->id,
                'code' => $datetime->format('Ym'),
                'name' => 'Ciclo '.$datetime->format('F').' '.$datetime->year,
                'description' => 'p'.($months-$counter),
                'closeup' => 'p'.($months-$counter),
                'ddd' => (($months_2_years-$counter) > 0)?'p'.($months_2_years - $counter):null,
                'pmp' => 'p'.($months-$counter),
                'start' => $datetime->format('Y-m').'-01',
                'end'    => $datetime->endOfMonth(),
                'status' => 'activo']);
          } 
    }
}
