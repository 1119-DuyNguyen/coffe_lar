<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_receipt', function (Blueprint $table) {
            $table->id();// primary key
            $table->unique(['receipt_id', 'product_id']);
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('receipt_id')->constrained()->cascadeOnDelete();

            $table->integer('quantity')->unsigned();
            $table->double('price')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_receipt');
    }
};
