<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'details'=>$this->faker->paragraph,
            'discount'=>$this->faker->numberBetween(5,30),
            'price'=>$this->faker->numberBetween(100,1000),
            'stock'=>$this->faker->randomNumber(),
        ];
    }
}
