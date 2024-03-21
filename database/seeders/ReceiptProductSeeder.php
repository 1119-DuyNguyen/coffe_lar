<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiptProductSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedDataPhieuNhap = Receipt::create([
            'name' => 'Nhập sản phẩm 1',
            'provider_id' => '1',
        ]);
    }
}
