<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "thumb_image" => 'uploads/products/tri-an-thay-co.jpg',
            "name" => 'Tri Ân Thầy Cô',
            "category_id" => '2',
            "description" => 'Món quà ý nghĩa ngày nhà giáo',
            "content" => 'fsdfsdfsdfsdfs',
            "price" => 337000,
            "status" => 1,
        ]);
    }
}
