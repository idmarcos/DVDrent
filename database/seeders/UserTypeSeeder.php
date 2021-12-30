<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_types=[
            'Admin',
            'User'
        ];
        $n=count($user_types);

        for($i=0; $i<$n; $i++){
            \DB::table('user_types')->insert([
                'type' => $user_types[$i]
            ]);
        }
    }
}
