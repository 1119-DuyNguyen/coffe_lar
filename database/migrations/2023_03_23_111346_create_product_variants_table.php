<?php

use App\Enums\VariantOption;
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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')-> constrained()->noActionOnDelete();
            $table->string('name');
            $table->tinyInteger('type')->unsigned()->default(VariantOption::radio);
            $table->boolean('must_have')->unsigned()->default(1);

            $table->boolean('status') -> default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
