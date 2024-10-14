<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Imports\CorporationImport;
use Maatwebsite\Excel\Facades\Excel;

class CorporationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('corporations')->delete();
        Excel::import(new CorporationImport, storage_path('app/public/corporations.csv'));
    }
}
