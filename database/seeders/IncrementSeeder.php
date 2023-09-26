<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hr\Increment;
class IncrementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $increments = [
            ['id'=>'1','user_id'=>'1','increment_date'=>'2020-05-10','previous_grade'=>'3','current_grade'=>'2','status'=>'Approved','approved_by'=>'1'],
            ['id'=>'2','user_id'=>'1','increment_date'=>'2021-05-10','previous_grade'=>'2','current_grade'=>'1','status'=>'Approved','approved_by'=>'1']
        ];
        Increment::insert($increments);
    }
}
