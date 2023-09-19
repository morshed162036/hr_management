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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->biginteger('invoice_detail_id');
            $table->string('product_title');
            $table->string('product_description');
            $table->string('product_code');
            $table->string('warranty')->nullable();
            $table->enum('product_status',['Buy','Assigned','returned','Damaged'])->default('Buy');
            $table->biginteger('assigned_to')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
