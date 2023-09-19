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
        Schema::create('sattlements', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->double('last_gross');
            $table->double('last_basic');
            $table->double('provident_fund');
            $table->double('gratuity');
            $table->string('leave_encashment_for_days');
            $table->double('others_bill')->default(0);
            $table->double('notice_pay')->default(0);
            $table->double('loan')->default(0);
            $table->double('other_dues')->default(0);
            $table->double('net_payable');
            $table->double('paid_amount');
            $table->double('dues');
            $table->enum('payment_status',['Paid','Unpaid','Pertial Payment'])->default('Unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sattlements');
    }
};
