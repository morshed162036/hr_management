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
        Schema::create('employee_personal_informations', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('religion');
            $table->string('blood_group');
            $table->enum('marital_status',['Single','Married']);
            $table->enum('employment_of_spouse',['yes','no']);
            $table->string('no_of_children')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_personal_informations');
    }
};
