<?php
namespace Database\Seeders;

use App\Imports\CompanyImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->delete();
        Excel::import(new CompanyImport, storage_path('app/public/company.csv'));
    }
}
