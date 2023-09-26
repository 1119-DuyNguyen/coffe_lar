<?php

namespace Database\Seeders;

use App\Enums\VariantOption;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products=Product::all();

        foreach ($products as $product)
            {
                $variant= new ProductVariant();
                $variant=$variant->fill([
                    'product_id' => $product->id,
                    'name' => 'Kích cỡ',
                    'type' => VariantOption::radio,
                    'must_have' => true,
                    'status' => true,
                ]);
                $variant->save();
                $name=['S'=>0,'M'=>6000,'L'=>10000];
                foreach ($name as $key=>$value)
                {
                    $variantItem=new ProductVariantItem();
                    $variantItem=$variantItem->fill(
                        [
                            'product_variant_id' => $variant->id,
                            'name' => $key,
                            'price' => $value,
                            'status' => true,
                        ]
                    );
                    $variantItem->save();
                }

            }
    }
}
