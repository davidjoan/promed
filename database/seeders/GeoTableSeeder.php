<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\GeoImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class GeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('geo')->delete();
        Excel::import(new GeoImport, storage_path('app/public/geo.csv'));
    }
}
