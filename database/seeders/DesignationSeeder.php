<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings\Designation;
class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            ['id'=>'1','title'=>'CEO'],
            ['id'=>'2','title'=>'MD'],
            ['id'=>'3','title'=>'Manager'],
        ];
        Designation::insert($designations);
    }
}
