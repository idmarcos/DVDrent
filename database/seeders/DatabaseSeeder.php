<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTypeSeeder::class,
            UserSeeder::class,
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\DVD::factory(100)->create();
        //\App\Models\UserDvd::factory(300)->create();
    }
}
