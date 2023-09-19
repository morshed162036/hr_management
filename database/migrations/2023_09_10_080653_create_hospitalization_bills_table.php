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
        Schema::create('hospitalization_bills', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->date('date');
            $table->string('bill_year');
            $table->double('medical_amount')->default(0);
            $table->double('hospitalization_amount')->default(0);
            $table->enum('status',['New','Approved','Declined']);
            $table->biginteger('approved_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitalization_bills');
    }
};
