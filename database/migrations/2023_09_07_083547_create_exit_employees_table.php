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
        Schema::create('exit_employees', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->enum('exit_type',['Resigned','Terminate','Dismiss','Died','Retired']);
            $table->date('exit_date');
            $table->date('effective_date');
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
        Schema::dropIfExists('exit_employees');
    }
};