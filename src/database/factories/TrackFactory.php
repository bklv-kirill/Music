<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Album;
use App\Models\Group;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(2),
            "date" => $this->faker->date("Y-m-d"),
            "image" => $this->faker->imageUrl(),
            "group_id" => Group::get()->random()->id,
            "album_id" => Album::get()->random()->id,
        ];
    }
}
