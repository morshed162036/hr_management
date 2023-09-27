<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hr\Loan_application;
class LoanApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applications = [
            ['id'=>'1','user_id'=>'1','loan_id'=>'2','loan_amount'=>'2000','total_month'=>'2','remaining_month'=>'2','installment_amount'=>'1000','status'=>'New','activation_date'=>'2023-03-01'],
            ['id'=>'2','user_id'=>'1','loan_id'=>'2','loan_amount'=>'2000','total_month'=>'2','remaining_month'=>'2','installment_amount'=>'1000','status'=>'New','activation_date'=>'2023-05-01'],
        ];
        Loan_application::insert($applications);
    }
}
