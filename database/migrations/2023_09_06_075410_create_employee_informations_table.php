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
        Schema::create('employee_informations', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->string('employee_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('alt_phone')->nullable();
            $table->string('address');
            $table->string('state');
            $table->string('country');
            $table->string('pincode')->nullable();
            $table->string('nid');
            $table->enum('gender',['Male','Female']);
            $table->date('join_date');
            $table->date('resign_date')->nullable();
            $table->enum('employee_type',['Probation','Permanent', 'Master Roll','Contractual']);
            $table->biginteger('wing_id');
            $table->biginteger('branch_id');
            $table->biginteger('department_id');
            $table->biginteger('section_id');
            $table->biginteger('designation_id');
            $table->biginteger('grade_id');
            $table->biginteger('report_to');
            $table->enum('pf&gratuity_eligiblity',['Yes','No']);
            $table->string('profile_pic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_informations');
    }
};
