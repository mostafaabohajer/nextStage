<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
//            'slug' => fake()->slug(),
            'email' => fake()->unique()->safeEmail(),
            'logo' => fake()->imageUrl(100,100),
            'website' => fake()->url(),
            'address' => fake()->address()
        ];
    }
}
