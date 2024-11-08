<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GeoTableSeeder::class);
        $this->call(BrickTableSeeder::class);
        $this->call(OrganizationTypeTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(AchievementTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SpecialtyTableSeeder::class);
        $this->call(OrganizationTableSeeder::class);//Remove in PRD
        $this->call(HobbyTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SegmentTableSeeder::class);
        $this->call(ClientTypeTableSeeder::class);
        $this->call(InstitutionTypeTableSeeder::class);
        $this->call(InstitutionTableSeeder::class);
        $this->call(TuitionTableSeeder::class);
        $this->call(UniversityTableSeeder::class);
        $this->call(ClientTableSeeder::class);//Remove in PRD
        $this->call(JobPositionTableSeeder::class);
        $this->call(TargetTableSeeder::class);//Remove in PRD
        $this->call(AssignmentTableSeeder::class);//Remove in PRD
        $this->call(ScheduleTableSeeder::class);//Remove in PRD
    }
}