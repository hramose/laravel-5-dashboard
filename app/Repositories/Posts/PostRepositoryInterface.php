<?php namespace App\Repositories\Posts;

interface PostRepositoryInterface {

    /**
     * Return a list of posts based on given criteria
     *
     * @return mixed
     */
    public function listAll();

    /**
     * Return a single post based on the given slug
     *
     * @param $slug
     *
     * @return App\Post
     */
    public function showPost($slug);

}