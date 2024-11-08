<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use LevelUp\Experience\Models\Achievement;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        $user01 = User::create(['name' => 'David Tataje','email' => 'davidtataje@gmail.com','password' => bcrypt('1234')]);
        $user02 = User::create(['name' => 'Joan Mendoza','email' => 'new.skin007@gmail.com','password' => bcrypt('1234')]);

        $achievement = Achievement::find(1);
        $user01->grantAchievement($achievement);
        $user02->grantAchievement($achievement);
    }
}
