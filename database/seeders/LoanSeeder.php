<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hr\Loan;
class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loans = [
            ['id'=>'1','title'=>'Advance Amount'],
            ['id'=>'2','title'=>'Personal Loan'],
            ['id'=>'3','title'=>'Home Loan'],
            ['id'=>'4','title'=>'Car Loan']
        ];

        Loan::insert($loans);
    }
}
