<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class ReceiptProductSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::set('services.is_seed_data', true);
        for ($i = 1; $i <= 5; ++$i) {
            $seedDataPhieuNhap = Receipt::create([
                'name' => 'Nhập sản phẩm ' . $i + 1,
                'provider_id' => '1',
                // 4* 30 sản phẩm
                'total_quantity' => 4 * 30,
                'total_price' => 9000 * 30
            ]);
        }
    }
}
