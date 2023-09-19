<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salary_slips', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('month');
            $table->string('year');
            $table->biginteger('user_id');
            $table->biginteger('designation_id');
            $table->biginteger('wing_id');
            $table->biginteger('branch_id');
            $table->biginteger('department_id');
            $table->biginteger('section_id');
            $table->biginteger('team_id');
            $table->string('location');
            $table->enum('pf_eligibility',['Yes','No']);
            $table->double('basic_salary');
            $table->double('house_rent');
            $table->double('conveyance');
            $table->double('lta');
            $table->double('medical');
            $table->double('special_pay')->default(0);
            $table->biginteger('arrear_id');
            $table->double('arrear_amount');
            $table->double('other_allowances');
            $table->double('total_additions');
            $table->double('pf_fund_amount')->default(0);
            $table->double('income_tax');
            $table->double('loan');
            $table->double('absent')->default(0);
            $table->double('mobile_bill');
            $table->double('advance_salary');
            $table->double('lunch')->default(0);
            $table->double('other_deduction')->default(0);
            $table->double('total_deduction');
            $table->double('net_payable');
            $table->double('paid_amount')->default(0);
            $table->enum('payment_status',['Paid','Unpaid','Partial Payment'])->default('Unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_slips');
    }
};
