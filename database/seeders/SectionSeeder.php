<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings\Section;
class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['id'=>'1','title'=>'Social Media','department_id'=>'2'],
            ['id'=>'2','title'=>'Content','department_id'=>'2'],
            ['id'=>'3','title'=>'Graphic Design','department_id'=>'2'],
            ['id'=>'4','title'=>'Web Design','department_id'=>'2'],
        ];

        Section::insert($sections);
    }
}
