<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->realText($maxNbChars = 500, $indexSize = 2),
            'created_at' => $this->faker->dateTimeBetween('2022-01-01', date("Y-m-d")),
            'deleted_at' => $this->faker->randomElement([
                null,
                $this->faker->dateTimeBetween('2021-01-01', date("Y-m-d"))
            ])
        ];
    }
}
