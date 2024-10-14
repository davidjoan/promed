<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FamilyImport;
use App\Imports\FamilySingleImport;

class FamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table('families')->delete();

        Excel::import(new FamilyImport, 'public/families_by_company.csv');
        Excel::import(new FamilySingleImport, 'public/families.csv');
    }
}
