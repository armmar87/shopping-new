<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\ProductType;
use App\Models\Product;
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $type = $this->faker->randomElement([ProductType::DIGITAL, ProductType::PHYSICAL]);

        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 5, 200),
            'type' => $type,
            'dimension' => $type === ProductType::PHYSICAL ? $this->faker->randomElement(['10x20x5', '15x15x3']) : null,
        ];
    }
}
