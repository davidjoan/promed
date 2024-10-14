<?php
namespace Database\Seeders;



use Illuminate\Database\Seeder;
use App\Models\Geo;
use App\Models\Segment;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SegmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('segments')->delete();

        $company = Company::where('name','App1t')->first();
		$geo     = Geo::getCountry('PE');

        Segment::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'AM', 'name' => 'Visitas Hospitales','description' => 'Visitas a Hospitales y clinicas durante la mañana'));
        Segment::create(array('company_id' => $company->id,'geo_id' => $geo->id,'code' => 'CO', 'name' => 'Visitas Consultorios','description' => 'Visitas a consultorios particulares durante la tarde'));
		
    }
}
