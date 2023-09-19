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
        Schema::create('increments', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->date('increment_date');
            $table->biginteger('previous_grade')->default(0);
            $table->biginteger('current_grade');
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
        Schema::dropIfExists('increments');
    }
};
