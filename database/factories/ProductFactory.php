<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $measures = ['ml', 'L', 'capsulas', 'g'];
        $gender   = ['female', 'male'];
        $name     = $this->faker->name($gender[$this->faker->numberBetween(0, 1)]);
        return [
            'name'                 => $name,
            'quantity_and_measure' => $this->faker->numberBetween(1, 81294) . ' ' . $measures[$this->faker->numberBetween(0, 3)],
            'description'          => $this->faker->text(),
            'expiration_date'      => $this->faker->date('d-m-Y'),
            'lot_number'           => $this->faker->randomNumber(3),
            'category_id'          => $this->faker->numberBetween(1, 5),
            'image'                => $this->faker->numberBetween(0, 10),
            'slug'                 => Str::slug($name),
        ];
    }
}
