<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Tuition;

use App\Models\Geo;
use Illuminate\Support\Facades\DB;
use LevelUp\Experience\Models\Level;
use Maatwebsite\Excel\Facades\Excel;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::add(
            ['level' => 1, 'next_level_experience' => null],
            ['level' => 2, 'next_level_experience' => 128],
            ['level' => 3, 'next_level_experience' => 256],
            ['level' => 4, 'next_level_experience' => 512],
            ['level' => 5, 'next_level_experience' => 1024],
            ['level' => 6, 'next_level_experience' => 2048],
            ['level' => 7, 'next_level_experience' => 2048*2],
            ['level' => 8, 'next_level_experience' => 2048*2*2],
            ['level' => 9, 'next_level_experience' => 2048*2*2*2],
            ['level' => 10, 'next_level_experience' => 2048*2*2*2*2],
        );
    }
}
