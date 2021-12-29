<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DvdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender=$this->faker->randomElement(['Action', 'Comedy', 'Horror', 'Romance', 'Thriller', 'Fantasy']);
        $age_rating=$this->faker->randomElement([0, 7, 12, 18]);

        return [
            'title'=>$this->faker->sentence(4),
            'duration'=>$this->faker->numberBetween(90, 180),
            'year'=>$this->faker->year('- 25 years'),
            'gender'=>$gender,
            'synopsis'=>$this->faker->paragraph,
            'cast'=>$this->faker->words(3, true),
            'age_rating'=>$age_rating,
            'available'=>$this->faker->boolean
        ];
    }
}
