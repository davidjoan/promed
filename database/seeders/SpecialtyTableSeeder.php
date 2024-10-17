<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\SpecialtyImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SpecialtyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialties')->delete();
        Excel::import(new SpecialtyImport, storage_path('app/public/specialty.csv'));
    }
}
