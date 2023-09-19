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
        Schema::create('employee_bank_informations', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->string('Bank_name');
            $table->string('branch');
            $table->string('address')->nullable();
            $table->string('account_name');
            $table->string('account_no');
            $table->string('swift_code')->nullable();
            $table->string('routing_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_bank_informations');
    }
};
