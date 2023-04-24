<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;


class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'number' => $this->faker->unique()->numberBetween(1,100),
            'brand'=>$this->faker->name(),
            'type'=>$this->faker->name(),
            'model'=>$this->faker->name(),
            'year'=>$this->faker->name(),
            'color'=>$this->faker->name(),
            'category'=>$this->faker->name(),
            'province_id'=>rand(1,10),
            'user_id'=>rand(1,10),
        ];
    }
}
