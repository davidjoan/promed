<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Company;
use App\Models\Geo;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $company = Company::where('name','App1t')->select('id')->first();
		$geo     = Geo::getCountry('PE');
        
        Category::create(array(
            'company_id' =>  $company->id,'geo_id' => $geo->id,
            'code' => 'V','name' => 'VIP','qty_visits' => 2 ));

        Category::create(array(
            'company_id' =>  $company->id,'geo_id' => $geo->id,
            'code' => 'A','name' => 'A','qty_visits' => 1));

        Category::create(array(
            'company_id' =>  $company->id,'geo_id' => $geo->id,
            'code' => 'B','name' => 'B','qty_visits' => 1));

        Category::create(array(
            'company_id' =>  $company->id,'geo_id' => $geo->id,
            'code' => 'C','name' => 'C','qty_visits' => 0));
   
    }
}
