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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->biginteger('vendor_id');
            $table->string('invoice_code');
            $table->string('total_item')->default(0);
            $table->string('total_amount')->default(0);
            $table->string('paid_amount')->default(0);
            $table->string('due_amount')->default(0);
            $table->enum('payment_status',['Paid','Unpaid','Pertial Payment'])->default('Unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
