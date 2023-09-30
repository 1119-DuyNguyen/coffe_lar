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
    private function seedVariant(array $variantData,array $variantItem){
        $variant= new ProductVariant();
        $variant=$variant->fill($variantData);
        $variant->save();
//        $name=['S'=>0,'M'=>6000,'L'=>10000];
        foreach ($variantItem as $key=>$value)
        {
            $variantItem=new ProductVariantItem();
            $variantItem=$variantItem->fill(
                [
                    'product_variant_id' => $variant->id,
                    'name' => $key,
                    'price' => $value,
                    'price_origin' => $value*80/100,
                    'status' => true,
                ]
            );
            $variantItem->save();
        }
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products=Product::all();

        foreach ($products as $product)
            {
                $this->seedVariant([
                    'product_id' => $product->id,
                    'name' => 'Kích cỡ',
                    'type' => VariantOption::radio,
                    'must_have' => true,
                    'status' => true,
                ],['Nhỏ'=>0,'Vừa'=>6000,'Lớn'=>10000]);
                $this->seedVariant([
                    'product_id' => $product->id,
                    'name' => 'Topping',
                    'type' => VariantOption::checkbox,
                    'must_have' => false,
                    'status' => true,
                ],['Trân châu'=>7000,'Hạt sen'=>1000]);

            }
    }
}
