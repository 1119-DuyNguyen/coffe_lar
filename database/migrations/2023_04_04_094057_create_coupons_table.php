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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('thumb_image');
            $table->string('code')->unique();
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('discount');
            $table->double('condition');
            $table->string('discount_type');
            $table->boolean('status') -> default(true);
            $table->integer('total')->default(0);
            $table->integer('total_used')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
