<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityData>
 */
class ActivityDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' =>\App\Models\User::inRandomOrder()->first()?->id,
            'activity_id' =>\App\Models\Activity::inRandomOrder()->first()?->id,
            'point_in_time' =>fake()->time('H:i:s'),
            'speed' => fake()->numberBetween(6,20)
        ];
    }
}
