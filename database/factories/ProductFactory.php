<?php

namespace Database\Factories;

use App\Models\User;
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
            'discount'=>$this->faker->numberBetween(5,10),
            'price'=>$this->faker->numberBetween(100,1000),
            'user_id'=>function(){
             return User::all()->random();
            },
            'stock'=>$this->faker->randomNumber(),
        ];
    }
}
