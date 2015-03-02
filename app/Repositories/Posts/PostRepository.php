<?php namespace App\Repositories\Posts;

use App\Post;

class PostRepository implements PostRepositoryInterface {

    protected $model;

    /**
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * Return a list of posts based on given criteria
     *
     * @param string $search
     * @param string $order
     * @param int $limit
     *
     * @return mixed
     */
    public function listAll($search = '', $order = 'created_at', $limit = 10)
    {
        $posts = $this->model->with('author')->orderBy($order)->paginate($limit);

        return $posts;
    }

}