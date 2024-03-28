<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductReport;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Config;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Replace with your actual model name

        Config::set('services.is_seed_data', true);

        // Create each order product record
        for ($i = 0; $i < 20; ++$i) {
            $order = Order::create(
                [
                    'name_receiver' => 'Nguyễn Thanh Duy',
                    'address_receiver' => 'Long an 1, Thị trấn Tân Túc, Huyện Bình Chánh, Thành phố Hồ Chí Minh',
                    'email_receiver' => 'thanhduy191103@gmail.com',
                    'note' => '--seed-data-' . $i,
                    'phone_receiver' => '0334202221',
                    'user_id' => 2,
                    'sub_total' => 11000,
                    'total_price' => 36000,
                    'total_quantity' => 4,
                    'payment_status' => 1,
                    'order_status' => 1,
                    'created_at' => '2022-07-01 06:13:54',
                    'updated_at' => '2022-07-01 06:13:54',
                    'fee_ship' => 15000,
                ]
            );
//            OrderProduct::create([
//                'order_id' => $order->id,
//                'product_id' => 1,
//                'quantity' => 1,
//                'price' => 20000,
//                'created_at' => '2022-07-01 06:13:54',
//                'updated_at' => '2022-07-01 06:13:54',
//            ]);
//            ProductReport::create(
//                [
//                    'product_id' => 1,
//                    'total_receipt' => 0,
//                    'total_sale' => 1,
//                    'price_receipt' => 0,
//                    'price_sale' => 20000,
//                    'created_at' => '2022-07-01 06:13:54',
//                    'updated_at' => '2022-07-01 06:13:54',
//                ]
//            );
        }
    }
}
