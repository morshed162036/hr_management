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
        Schema::create('transefers', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->biginteger('prev_designation_id');
            $table->biginteger('current_designation_id');
            $table->biginteger('prev_department_id');
            $table->biginteger('current_department_id');
            $table->biginteger('prev_wing_id');
            $table->biginteger('current_wing_id');
            $table->biginteger('prev_branch_id');
            $table->biginteger('current_branch_id');
            $table->biginteger('prev_reporting_to');
            $table->biginteger('current_reporting_to');
            $table->date('effected_date');
            $table->enum('status',['New','Approved','Declined']);
            $table->biginteger('approved_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transefers');
    }
};
