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
        Schema::create('gratuity_lists', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->biginteger('gratuity_id');
            $table->double('salary');
            $table->integer('gratuity_package');
            $table->double('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gratuity_lists');
    }
};
