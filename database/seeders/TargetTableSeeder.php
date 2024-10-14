<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Imports\TargetImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TargetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('targets')->delete();
        Excel::import(new TargetImport, storage_path('app/public/targets.csv'));
    }
}
