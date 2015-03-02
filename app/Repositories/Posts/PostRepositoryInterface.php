<?php namespace App\Repositories\Posts;

interface PostRepositoryInterface {

    /**
     * Return a list of posts based on given criteria
     *
     * @param string $search
     * @param string $orderBy
     * @param int $limit
     *
     * @return mixed
     */
    public function listAll($search = '', $orderBy = '', $limit = 15);

}