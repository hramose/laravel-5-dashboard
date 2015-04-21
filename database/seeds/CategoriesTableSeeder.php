<?php

use App\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 5) as $index)
        {
            $category = new Category;
            $category->name = $faker->word();
            $category->save();

            $childrenCount = rand(0, 5);

            for ($i = 0; $i < $childrenCount; $i++)
            {
                $subCategory = new Category;
                $subCategory->name = $faker->word();
                $subCategory->parent_id = $category->id;
                $subCategory->save();
            }
        }
    }

}