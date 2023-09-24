<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leave\Holiday;
class HolidaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $holidays = [
            ['id'=>'1','title'=>'holiday 10','year'=>'2023','holiday_date'=>'2023-02-05','holiday_type'=>'Govt','description'=>'govt holiday','created_by'=>'1'],
            ['id'=>'2','title'=>'holiday 9','year'=>'2023','holiday_date'=>'2023-03-05','holiday_type'=>'Company','description'=>'Company holiday','created_by'=>'1'],
            ['id'=>'3','title'=>'holiday 8','year'=>'2023','holiday_date'=>'2023-04-05','holiday_type'=>'Govt','description'=>'govt holiday','created_by'=>'1'],
            ['id'=>'4','title'=>'holiday 7','year'=>'2022','holiday_date'=>'2022-05-05','holiday_type'=>'Company','description'=>'Company holiday','created_by'=>'1'],
            ['id'=>'5','title'=>'holiday 6','year'=>'2022','holiday_date'=>'2022-06-05','holiday_type'=>'Govt','description'=>'govt holiday','created_by'=>'1'],
            ['id'=>'6','title'=>'holiday 5','year'=>'2021','holiday_date'=>'2021-07-05','holiday_type'=>'Govt','description'=>'govt holiday','created_by'=>'1']
        ];
        Holiday::insert($holidays);
    }
}
