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
        $user02 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user03 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user04 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user05 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user06 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user07 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user08 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user09 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user10 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user11 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);
        $user12 = User::create(['name' => $faker->name,'email' => $faker->email,'password' => bcrypt('1234')]);

        $achievement = Achievement::find(1);
        $user01->grantAchievement($achievement);
        $user02->grantAchievement($achievement);
        $user03->grantAchievement($achievement);
        $user04->grantAchievement($achievement);
        $user05->grantAchievement($achievement);
        $user06->grantAchievement($achievement);
        $user07->grantAchievement($achievement);
        $user08->grantAchievement($achievement);
        $user09->grantAchievement($achievement);
        $user10->grantAchievement($achievement);
        $user11->grantAchievement($achievement);
        $user12->grantAchievement($achievement);
    }
}
