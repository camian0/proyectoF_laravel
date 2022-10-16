<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name('female'),
            'description' => $this->faker->text(),
            'priority'    => $this->faker->numberBetween(1, 5),
        ];
    }
}
