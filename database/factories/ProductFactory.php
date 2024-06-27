<?php

namespace Database\Factories;

use App\Enums\Product\ProductStatus;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = [ProductStatus::AVAILABLE_PRODUCT->value, ProductStatus::UNAVAILABLE_PRODUCT->value];
        $images = ['1.jpg', '2.jpg', '3.jpg'];

        return [
            'name' => fake()->word,
            'description' => fake()->paragraph(1),
            'quantity' => fake()->numberBetween(1, 10),
            'status' => fake()->randomElement($status),
            'image' => fake()->randomElement($images),
            'seller_id' => User::factory()
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Product $product) {
            // Attach 1-3 categories to the product
            $product->categories()->attach(
                Category::factory()->count(fake()->numberBetween(1, 3))->create()
            );
        });
    }
}
