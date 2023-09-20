<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['id'=>'1','title'=>'Finance'],
            ['id'=>'2','title'=>'Digital Marketing'],
            ['id'=>'3','title'=>'Corporate communication'],
            ['id'=>'4','title'=>'Human resources'],
            ['id'=>'5','title'=>'Accounting']
        ];

        Department::insert($departments);
    }
}
