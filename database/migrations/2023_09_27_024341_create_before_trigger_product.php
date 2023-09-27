<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        Schema::create('before_trigger_product', function (Blueprint $table) {
//
//        });
        DB::unprepared("
CREATE TRIGGER before_update_trigger_product BEFORE UPDATE ON products FOR EACH ROW
BEGIN
    IF NEW.price_origin <= 0 THEN
        SET NEW.price_origin = NEW.price;
    END IF;
END
            ");
        DB::unprepared("

CREATE TRIGGER before_insert_trigger_product BEFORE INSERT ON products FOR EACH ROW
BEGIN
    IF NEW.price_origin <= 0 THEN
        SET NEW.price_origin = NEW.price;
    END IF;
END

            ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
