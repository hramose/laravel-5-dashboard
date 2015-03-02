<?php

use App\Post;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $users = User::all();
        $statuses = ['draft', 'published'];

        foreach(range(1, 25) as $index)
        {
            $userRange = range(0, count($users));
            $randomIndex = $userRange[array_rand($userRange)];
            $status = $statuses[array_rand($statuses)];
            $title = $faker->sentence();

            $users[$randomIndex]->posts()->save(new Post([
                'title' => $title,
                'content' => implode('<br>', $faker->paragraphs($nb = 3)),
                'slug' => str_slug($title, '-'),
                'status' => $status
            ]));
        }
    }

}