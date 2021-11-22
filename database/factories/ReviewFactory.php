<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>function(){
                Product::all();
            },
            'customer'=>$this->faker->name,
            'review'=>$this->faker->words(30,50),
            'star'=>$this->faker->numberBetween(0,5),
        ];
    }
}
