<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TravelPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'slug' => $this->faker->text,
            
        ];
    }
}
