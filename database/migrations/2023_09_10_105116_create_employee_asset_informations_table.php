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
        Schema::create('employee_asset_informations', function (Blueprint $table) {
            $table->id();
            $table->biginteger('product_id');
            $table->date('receive_date');
            $table->date('return_date')->nullable();
            $table->enum('product_condition',['Good','Damage']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_asset_informations');
    }
};
