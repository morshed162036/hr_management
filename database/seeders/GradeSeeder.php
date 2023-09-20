<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings\Grade;
class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            ['id'=>'1','title'=>'AAA'],
            ['id'=>'2','title'=>'AA'],
            ['id'=>'3','title'=>'A'],
            ['id'=>'4','title'=>'BBB'],
            ['id'=>'5','title'=>'BB'],
        ];
        Grade::insert($grades);
    }
}
