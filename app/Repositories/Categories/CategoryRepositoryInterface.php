<?php namespace App\Repositories\Categories;

interface CategoryRepositoryInterface {

    /**
     * Return a list of categories based on given criteria
     *
     * @return mixed
     */
    public function listAll();

}