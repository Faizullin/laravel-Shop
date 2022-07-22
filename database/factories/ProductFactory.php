<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->unique()->name,
            'description'=>$this->faker->sentence,
            'content'=>$this->faker->text,
            'price'=>$this->faker->numberBetween(5,100),
            'count'=>$this->faker->numberBetween(0,100),
            'isPublished'=>true,
            'user_id'=>\App\Models\User::all()->random()->id,
            'category_id'=>\App\Models\Category::all()->random()->id
        ];
    }
}
