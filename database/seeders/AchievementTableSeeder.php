<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Tuition;

use App\Models\Geo;
use Illuminate\Support\Facades\DB;
use LevelUp\Experience\Models\Achievement;
use LevelUp\Experience\Models\Level;
use Maatwebsite\Excel\Facades\Excel;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Achievement::create([
            'name' => 'Welcome',
            'is_secret' => false,
            'description' => 'When a User hits Level 1',
            'image' => '/storage/achievements/level-1.png',
        ]);
        Achievement::create([
            'name' => 'Hit Level 2',
            'is_secret' => false,
            'description' => 'When a User hits Level 2',
            'image' => 'storage/achievements/level-2.png',
        ]);
        Achievement::create([
            'name' => 'Hit Level 3',
            'is_secret' => false,
            'description' => 'When a User hits Level 3',
            'image' => 'storage/achievements/level-3.png',
        ]);
        Achievement::create([
            'name' => 'Hit Level 4',
            'is_secret' => false,
            'description' => 'When a User hits Level 4',
            'image' => 'storage/achievements/level-4.png',
        ]);
        Achievement::create([
            'name' => 'Hit Level 5',
            'is_secret' => false,
            'description' => 'When a User hits Level 5',
            'image' => 'storage/achievements/level-5.png',
        ]);
        Achievement::create([
            'name' => 'Hit Level 6',
            'is_secret' => false,
            'description' => 'When a User hits Level 6',
            'image' => 'storage/achievements/level-6.png',
        ]);
        Achievement::create([
            'name' => 'Hit Level 7',
            'is_secret' => false,
            'description' => 'When a User hits Level 7',
            'image' => 'storage/achievements/level-7.png',
        ]);
        Achievement::create([
            'name' => 'Hit Level 8',
            'is_secret' => false,
            'description' => 'When a User hits Level 8',
            'image' => 'storage/achievements/level-8.png',
        ]);
    }
}
