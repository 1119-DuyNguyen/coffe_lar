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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->noActionOnDelete();
            $table->foreignId('product_id')->constrained()->noActionOnDelete();
            $table->json('variants');
            $table->integer('variant_total_price')->unsigned()->default(0);
            $table->integer('variant_total_price_origin')->unsigned()->default(0);
            $table->integer('product_price')->unsigned()->default(0);
            $table->integer('product_price_origin')->unsigned()->default(0);
            $table->integer('discount_price')->unsigned()->default(0);
            $table->integer('qty')->unsigned();
            $table->integer('sub_total')->unsigned()->default(0);
            $table->integer('sub_total_profit')->unsigned()->default(0);

            $table->unique(['order_id', 'product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
