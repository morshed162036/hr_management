<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hr\Promotion;
class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotions = [
            ['id'=>'1','user_id'=>'1','promotion_date'=>'2020-05-10','previous_designation'=>'3','current_designation'=>'2','status'=>'Approved','approved_by'=>'1'],
            ['id'=>'2','user_id'=>'1','promotion_date'=>'2021-05-10','previous_designation'=>'2','current_designation'=>'1','status'=>'Approved','approved_by'=>'1']
        ];
        Promotion::insert($promotions);
    }
}
