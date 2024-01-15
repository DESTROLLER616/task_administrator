<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
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
            'description' => fake()->text(),
            'user' => fake()->userName(),
            'is_completed' => fake()->boolean(),
            'starts_at' => fake()->date(),
            'expired_at' => fake()->date(),
            'company_id' => fake()->randomElement(range(1,20))
        ];
    }
}
