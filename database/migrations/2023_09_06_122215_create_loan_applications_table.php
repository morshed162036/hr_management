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
            $table->string('installment_amount');
            $table->enum('status',['New','Approved','Declined']);
            $table->biginteger('approved_by');
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
