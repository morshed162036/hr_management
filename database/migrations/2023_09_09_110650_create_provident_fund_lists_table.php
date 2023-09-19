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
        Schema::create('provident_fund_lists', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->biginteger('grade_id');
            $table->biginteger('pf_fund_id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('amount');
            $table->biginteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provident_fund_lists');
    }
};
