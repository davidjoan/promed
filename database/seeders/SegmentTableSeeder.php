<?php
namespace Database\Seeders;



use Illuminate\Database\Seeder;
use App\Models\Geo;
use App\Models\Segment;

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
		$geo = Geo::getCountry('PE');

        Segment::create(array('geo_id' => $geo->id,'code' => 'HO', 'name' => 'Visitas Hospitales','description' => 'Visitas a Hospitales y clinicas durante la mañana'));
        Segment::create(array('geo_id' => $geo->id,'code' => 'CO', 'name' => 'Visitas Consultorios','description' => 'Visitas a consultorios particulares durante la tarde'));
        Segment::create(array('geo_id' => $geo->id,'code' => 'FA', 'name' => 'Visitas Farmacias','description' => 'Visitas a Farmacias durante el día'));
		
    }
}
