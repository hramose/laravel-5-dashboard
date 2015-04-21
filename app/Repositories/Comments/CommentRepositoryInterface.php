<?php namespace App\Repositories\Comments;

interface CommentRepositoryInterface {

    /**
     * Return a list of comments based on given criteria
     *
     * @return mixed
     */
    public function listAll();

}