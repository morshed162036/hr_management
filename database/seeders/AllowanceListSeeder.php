<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hr\Allowance_list;
class AllowanceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            ['id'=>'1','user_id'=>'1','designation_id'=>'1','allowance_id'=>'1','amount'=>'100','start_date'=>'2023-05-10'],
            ['id'=>'2','user_id'=>'1','designation_id'=>'1','allowance_id'=>'2','amount'=>'200','start_date'=>'2023-05-10'],
            ['id'=>'3','user_id'=>'1','designation_id'=>'1','allowance_id'=>'2','amount'=>'300','start_date'=>'2023-05-10']
        ];
        Allowance_list::insert($list);
    }
}
