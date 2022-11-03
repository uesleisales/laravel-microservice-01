<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        return [
            'category_id' => Category::factory()->create(),
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->email(),
            'whatsapp' => fake()->unique()->numberBetween(1000000000,9999999999),
        ];
    }
}
