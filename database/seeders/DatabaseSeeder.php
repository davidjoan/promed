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
        $this->call(DepartmentSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(ProvinceCapitalSeeder::class);
        $this->call(CorporationTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(BrickTableSeeder::class);
        $this->call(OrganizationTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SpecialtyTableSeeder::class);
        $this->call(OrganizationTableSeeder::class);
        $this->call(CampaignTableSeeder::class);
        $this->call(HobbyTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SegmentTableSeeder::class);
        $this->call(ClientTypeTableSeeder::class);
        $this->call(InstitutionTypeTableSeeder::class);
        $this->call(InstitutionTableSeeder::class);
       // $this->call(PeruGeoJsonSeeder::class);
        $this->call(TuitionTableSeeder::class);
        $this->call(UniversityTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(JobPositionTableSeeder::class);
        $this->call(TargetTableSeeder::class);
        $this->call(AssignmentTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
    }
}