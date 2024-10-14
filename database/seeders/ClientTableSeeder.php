<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\ClientImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->delete();
        Excel::import(new ClientImport, storage_path('app').'/public/clients.csv');
    }
}
