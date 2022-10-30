<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = ['female', 'male'];
        $name   = $this->faker->name($gender[$this->faker->numberBetween(0, 1)]);
        return [
            'name'        => $name,
            'description' => $this->faker->text(),
            'priority'    => $this->faker->numberBetween(1, 5),
            'slug'        => Str::slug($name),
        ];
    }
}
