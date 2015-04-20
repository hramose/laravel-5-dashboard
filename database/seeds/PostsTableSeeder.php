<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $users = User::all();
        $statuses = ['draft', 'published'];

        foreach(range(1, 100) as $index)
        {
            $userRange = range(0, ($users->count() - 1));
            $randomIndex = array_rand($userRange);
            $status = $statuses[array_rand($statuses)];
            $title = $faker->sentence();

            $post = $users[$randomIndex]->posts()->save(new Post([
                'title' => $title,
                'content' => implode('<br>', $faker->paragraphs($nb = 3)),
                'slug' => str_slug($title, '-'),
                'status' => $status
            ]));

            $this->addPostCategories($post);
            $this->addPostTags($post);
        }
    }

    /**
     * @param $post
     */
    private function addPostCategories($post)
    {
        $categoryIds = Category::all()->lists('id');
        $numberOfCategories = rand(0, 3);

        if ($numberOfCategories > 0)
        {
            $randCategoryIds = array_map(
                function($key) use ($categoryIds) { return $categoryIds[$key]; },
                (array) array_rand($categoryIds, $numberOfCategories)
            );
            $post->categories()->attach($randCategoryIds);
        }
    }

    /**
     * @param $post
     */
    private function addPostTags($post)
    {
        $tagIds = Tag::all()->lists('id');
        $numberOfTags = rand(0, 3);

        if ($numberOfTags > 0)
        {
            $randTagIds = array_map(
                function($key) use ($tagIds) { return $tagIds[$key]; },
                (array) array_rand($tagIds, $numberOfTags)
            );
            $post->tags()->attach($randTagIds);
        }
    }

}