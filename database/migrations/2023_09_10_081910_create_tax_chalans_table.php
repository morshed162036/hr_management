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
        Schema::create('tax_chalans', function (Blueprint $table) {
            $table->id();
            $table->string('challan_no');
            $table->date('challan_date');
            $table->year('to');
            $table->year('from');
            $table->string('tax_zone');
            $table->biginteger('user_id');
            $table->double('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_chalans');
    }
};
