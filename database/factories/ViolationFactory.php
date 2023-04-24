<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ViolationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number'=> $this->faker->unique()->numberBetween(1,100),
            'important'=>rand(0,1),
            'title'=>$this->faker->name(),
            'location'=>$this->faker->name(),
            'post_date' => $this->faker->date(),
            'title'=>$this->faker->name(),
            'cost'=>$this->faker->text(20),
            'trial_time'=>$this->faker->text(20),
            'car_id'=>rand(1,10),
            'violation_type_id'=>rand(1,10),
            'province_id'=>rand(1,10),
            'user_id'=>rand(1,10),
        ];
    }
}
