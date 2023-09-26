<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([SuperAdminSeeder::class,EmployeeSeeder::class]);
        $this->call([WingsSeeder::class,BranchOfficeSeeder::class]);
        $this->call([DepartmentSeeder::class,SectionSeeder::class]);
        $this->call([DesignationSeeder::class,GradeSeeder::class]);
        $this->call([HolidaysSeeder::class,LeaveSeeder::class,LeaveApplicationSeeder::class]);
        $this->call([PromotionSeeder::class,IncrementSeeder::class]);
    }
}
