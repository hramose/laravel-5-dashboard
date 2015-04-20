<?php

use App\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 25) as $index)
        {
            $tag = new Tag;
            $tag->name = $faker->word();
            $tag->save();
        }
    }

}