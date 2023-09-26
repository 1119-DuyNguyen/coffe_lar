<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\VariantOption;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\ProductVariant>
 */
final class ProductVariantFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = ProductVariant::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'product_id' => '1',
            'name' => 'Kích cỡ',
            'type' => VariantOption::radio,
            'must_have' => true,
            'status' => true,
        ];
    }
}
