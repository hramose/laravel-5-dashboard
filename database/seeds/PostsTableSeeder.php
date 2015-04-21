<?php

use App\Category;
use App\Comment;
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
        $statuses = ['draft' => 'Draft', 'published' => 'Published'];

        foreach(range(1, 100) as $index)
        {
            $userRange = range(0, ($users->count() - 1));
            $randomIndex = array_rand($userRange);
            $status = array_rand($statuses);
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

        $this->addPostsComments();
    }

    /**
     * @param $post
     */
    private function addPostCategories($post)
    {
        $categoryIds = Category::all()->lists('name', 'id');
        $numberOfCategories = rand(0, 3);

        if ($numberOfCategories > 0)
        {
            $post->categories()->attach(array_rand($categoryIds, $numberOfCategories));
        }
    }

    /**
     * @param $post
     */
    private function addPostTags($post)
    {
        $tagIds = Tag::all()->lists('name', 'id');
        $numberOfTags = rand(0, 3);

        if ($numberOfTags > 0)
        {
            $post->tags()->attach(array_rand($tagIds, $numberOfTags));
        }
    }

    /**
     * Add comments to posts
     */
    private function addPostsComments()
    {
        $posts = Post::all();
        $postIds = $posts->lists('id');
        $comments = Comment::all();

        foreach ($comments as $comment)
        {
            $posts[array_rand($postIds)]->comments()->save($comment);
        }
    }

}