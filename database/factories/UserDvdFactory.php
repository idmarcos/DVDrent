<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Dvd;
use App\Models\User;
use App\Models\UserDvd;

class UserDvdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $n_users=User::where('id', '!=', 1)->count();
        $n_dvds=DVD::count();
        $rent_date=$this->faker->dateTimeInInterval('-24 years', '- 10 months', null);
        $return_date=$this->faker->randomElement([null, $this->faker->dateTimeInInterval($rent_date, '+ 7 days', null)]);
        
        return [
            'user_id'=>$this->faker->numberBetween(2, $n_users),
            'dvd_id'=>$this->faker->numberBetween(1, $n_dvds),
            'rent_date'=>$rent_date,
            'return_date'=>$return_date,
            'address'=>$this->faker->address,
            'postal_code'=>$this->faker->randomNumber(6, true),
            'state'=>$this->faker->state,
        ];
    }
}
