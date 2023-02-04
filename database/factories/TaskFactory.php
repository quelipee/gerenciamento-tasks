<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
            'user_id'=>function()
            {
                return User::factory()->create()->id;
            },
            'title' => fake()->title(),
            'description' => fake()->text(),
            'date_end' => fake()->date(),
            'status' => fake()->title()
        ];
    }
}
