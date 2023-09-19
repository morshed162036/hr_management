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
        Schema::create('employee_leave_informations', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->biginteger('leave_id');
            $table->integer('days')->default(0);
            $table->integer('remaining_days');
            $table->integer('carry_leave')->default(0);
            $table->string('year');
            $table->string('description')->nullable();
            $table->enum('status',['Active','Inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_leave_informations');
    }
};
