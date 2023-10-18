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
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('thumb_image');

            $table->foreignId('category_id')->constrained()->noActionOnDelete();
            $table->text('description');
            $table->text('content');
//            $table->integer('qty')->unsigned()->default(100);
            //Khối lượng (gram)
            $table->integer('weight')->unsigned()->default(500);

            $table->double('price')->unsigned();

            $table->boolean('status') -> default(true);
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
