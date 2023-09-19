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
        Schema::create('hospitalization_limit_lists', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->biginteger('hospitalization_limit_id')->default(0);
            $table->double('medical_limit')->default(0);
            $table->double('hospital_limit')->default(0);
            $table->biginteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitalization_limit_lists');
    }
};
