<?php
namespace Database\Seeders;

use App\Imports\RegionImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->delete();
        Excel::import(new RegionImport, storage_path('app').'/public/region.csv');
    }
}
