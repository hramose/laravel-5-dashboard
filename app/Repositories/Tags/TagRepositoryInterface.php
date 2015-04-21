<?php namespace App\Repositories\Tags;

interface TagRepositoryInterface {

    /**
     * Return a list of tags based on given criteria
     *
     * @return mixed
     */
    public function listAll();

}