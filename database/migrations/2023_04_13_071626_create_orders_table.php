<?php

use App\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->noActionOnDelete();
            $table->string('name_receiver');
            $table->text('address_receiver');
            $table->string('phone_receiver');
            $table->string('email_receiver');
            $table->text('note')->nullable();
            $table->double('sub_total');
            $table->double('fee_ship')->default(0);
            $table->double('total_price')->unsigned();
            $table->double('total_quantity')->unsigned();
            $table->boolean('payment_status')->default(false);
            $table->tinyInteger('order_status')->default(OrderStatus::pending);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
