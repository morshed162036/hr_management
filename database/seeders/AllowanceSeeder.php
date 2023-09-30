<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hr\Allowance;
class AllowanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allowance = [
            ['id'=>'1','title'=>'Transport','created_by'=>'1'],
            ['id'=>'2','title'=>'Mobile Bill','created_by'=>'1'],
            ['id'=>'3','title'=>'Meal','created_by'=>'1'],
            ['id'=>'4','title'=>'Clothing','created_by'=>'1'],
            ['id'=>'5','title'=>'Good Attendance','created_by'=>'1'],
            ['id'=>'6','title'=>'Overseas','created_by'=>'1'],
            ['id'=>'7','title'=>'Others','created_by'=>'1']
        ];
        Allowance::insert($allowance);
    }
}
