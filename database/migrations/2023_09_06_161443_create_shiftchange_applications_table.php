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
        Schema::create('shiftchange_applications', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->biginteger('schedule_id');
            $table->enum('type',['Exchange','Change']);
            $table->biginteger('exchange_with')->default(0);
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
        Schema::dropIfExists('shiftchange_applications');
    }
};
