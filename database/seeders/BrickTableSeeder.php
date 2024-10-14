<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\BrickImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BrickTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bricks')->delete();
        Excel::import(new BrickImport, storage_path('app').'/public/bricks.csv');
    }
}
