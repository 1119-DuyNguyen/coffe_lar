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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('checkin_id')->references('id')->on('checkins');
            $table->foreignId('contract_id')->references('id')->on('contracts');
            $table->decimal('overtime_pay', 10, 2);   // Adjust decimal places as needed         // Adjust decimal places as needed
            $table->decimal('deductions', 10, 2);    // Adjust decimal places as needed
            $table->decimal('total_salary', 10, 2);  // Adjust decimal places as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
