<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        User::create(['name' => 'David Tataje','email' => 'davidtataje@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'gerentegeneral1@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'gerentedivision1@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'jefeproducto1@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'jefeproducto2@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'jefeproducto3@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'supervisor1@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'supervisor2@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'consultor1@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'consultor2@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'consultor3@gmail.com','password' => bcrypt('1234')]);
        User::create(['name' => $faker->name,'email' => 'consultor4@gmail.com','password' => bcrypt('1234')]);
    }
}
