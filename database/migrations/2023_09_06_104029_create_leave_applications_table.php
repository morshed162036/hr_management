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
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->biginteger('leave_id');
            $table->date('from');
            $table->date('to');
            $table->string('days');
            $table->string('reason');
            $table->enum('type',['Online','Offline'])->default('Offline');
            $table->enum('status',['New','Approved','Declined'])->default('New');
            $table->biginteger('applied_by')->default(0);
            $table->biginteger('approved_by')->default(0);
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_applications');
    }
};
