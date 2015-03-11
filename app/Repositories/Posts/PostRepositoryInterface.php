<?php namespace App\Repositories\Posts;

interface PostRepositoryInterface {

    /**
     * Return a list of posts based on given criteria
     *
     * @return mixed
     */
    public function listAll();

}