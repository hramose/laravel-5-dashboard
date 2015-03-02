<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 25) as $index)
        {
            User::create([
                'email' => $faker->email,
                'name' => $faker->name,
                'password' => '123456'
            ]);
        }

        User::create([
            'email' => 'admin@admin.com',
            'name' => $faker->name,
            'password' => '123456'
        ]);
    }

}