<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ProductVariantItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\ProductVariantItem>
 */
final class ProductVariantItemFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = ProductVariantItem::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'product_variant_id' => \App\Models\ProductVariant::factory(),
            'name' => fake()->name,
            'price' => fake()->randomFloat(),
            'status' => fake()->boolean,
        ];
    }
}
