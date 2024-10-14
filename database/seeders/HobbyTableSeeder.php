<?php
namespace Database\Seeders;

use App\Imports\HobbyImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class HobbyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobbies')->delete();
        Excel::import(new HobbyImport, storage_path('app/public/hobbies.csv'));
    }
}
