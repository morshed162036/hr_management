<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings\Wing;
class WingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wings = [
            ['id'=>'1','title'=>'Zariq Ltd']
        ];
        Wing::insert($wings);
    }
}
