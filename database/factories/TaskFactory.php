<?php

namespace Database\Factories;

use App\Models\Project;
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
            'project_id' => Project::inRandomOrder()->first()->id,
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(3),
            'is_completed' => $this->faker->boolean(20),
            'deadline' => $this->faker->optional(0.5)->dateTimeBetween('now', '+1 month')
        ];
    }
}
