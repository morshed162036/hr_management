<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leave\Leave;
class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaves = [
            ['id'=>'1','title'=>'Sick leave','description'=>'','days'=>'10'],
            ['id'=>'2','title'=>'Maternity and paternity leave','description'=>'','days'=>'20'],
            ['id'=>'3','title'=>'Bereavement leave','description'=>'','days'=>'5'],
            ['id'=>'4','title'=>'Casual leave','description'=>'','days'=>'10'],
            ['id'=>'5','title'=>'Unpaid leave','description'=>'','days'=>'5']
        ];

        Leave::insert($leaves);
    }

}
