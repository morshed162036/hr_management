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
        Schema::create('employee_education_informations', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->string('institution');
            $table->string('degree');
            $table->date('starting_date');
            $table->date('complete_date');
            $table->string('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_education_informations');
    }
};
