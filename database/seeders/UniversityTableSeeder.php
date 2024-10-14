<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Imports\UniversityImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table('universities')->delete();
        Excel::import(new UniversityImport, storage_path('app/public/universities.csv'));
    }
}
