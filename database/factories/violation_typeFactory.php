<?php

namespace Database\Factories;

use App\Models\violation_type;


use Illuminate\Database\Eloquent\Factories\Factory;

class violation_typeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = violation_type::class;

    public function definition()
    {
        return [
            'title'=>$this->faker->name(),
            'cost'=>$this->faker->text(20),
            'points'=>rand(1,10),
        ];

    }
}
