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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->biginteger('loan_id');
            $table->string('loan_amount');
            $table->string('total_month');
            $table->string('remaining_month')->nullable();
            $table->string('installment_amount');
            $table->enum('status',['New','Approved','Declined'])->default('New');
            $table->biginteger('approved_by')->default(0);
            $table->date('activation_date')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
