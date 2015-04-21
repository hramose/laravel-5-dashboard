<?php

use App\Comment;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $users = User::all();
        $statuses = ['pending', 'approved'];

        foreach(range(1, 60) as $index)
        {
            $userRange = range(0, ($users->count() - 1));
            $randomIndex = array_rand($userRange);
            $status = $statuses[array_rand($statuses)];

            if ($index % 7 == 0)
            {
                Comment::create([
                    'content' => implode('<br>', $faker->paragraphs($nb = 2)),
                    'status' => $status
                ]);
            }
            else
            {
                $users[$randomIndex]->comments()->save(new Comment([
                    'content' => implode('<br>', $faker->paragraphs($nb = 2)),
                    'status' => $status
                ]));
            }
        }
    }

}