<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Replace with your actual model name


        // Create each order product record
        for ($i = 0; $i < 50; ++$i) {
            $order = Order::create(
                [
                    'name_receiver' => 'Nguyễn Thanh Duy',
                    'address_receiver' => 'Long an 1, Thị trấn Tân Túc, Huyện Bình Chánh, Thành phố Hồ Chí Minh',
                    'email_receiver' => 'thanhduy191103@gmail.com',
                    'note' => '--seed-data-' . $i,
                    'phone_receiver' => '0334202221',
                    'user_id' => 2,
                    'sub_total' => 20000,
                    'total' => 35000,
                    'payment_status' => 1,
                    'order_status' => 1,
                    'created_at' => '2022-07-01 06:13:54',
                    'updated_at' => '2022-07-01 06:13:54',
                    'fee_ship' => 15000,
                ]
            );
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => 1,
                'qty' => 1,
                'product_price' => 20000,
                'product_name' => ' Cà Phê Hòa Tan Đậm Vị Việt Túi 40x16G --seed-data-' . $i,
            ]);
        }
    }
}
