<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leave\Leave_application;
class LeaveApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $application = [
            ['id'=>'1','user_id'=>'1','leave_id'=>'1','from'=>'2023-09-01','to'=>'2023-09-05','days'=>'5','reason'=>'Sick','type'=>'Offline','status'=>'New','applied_by'=>'1']
        ];
        Leave_application::insert($application);
    }
}
