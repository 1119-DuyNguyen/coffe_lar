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
        Schema::create('order_product_variant_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_product_variant_id')->constrained()->noActionOnDelete();
            $table->foreignId('product_variant_item_id')->constrained()->noActionOnDelete();
            $table->string('item_name');
            $table->double('item_price');
            $table->unique('order_product_variant_id','product_variant_item_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product_variant_items');
    }
};
