<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings\Branch_office;
class BranchOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ['id'=>'1','title'=>'Head Office','phone'=>'12345678987','email'=>'headoffice@gmail.com','address'=>'Mirpur','wing_id'=>'1']
        ];
        Branch_office::insert($branches);
    }
}
