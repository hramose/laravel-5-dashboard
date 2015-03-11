<?php namespace App\Repositories\Posts;

use App\Post;
use App\Repositories\DataTableTrait;
use Illuminate\Http\Request;

class PostRepository implements PostRepositoryInterface {

    use DataTableTrait {
        DataTableTrait::__construct as private __dtConstruct;
    }

    protected $model;

    /**
     * @param Request $request
     * @param Post $model
     */
    public function __construct(Request $request, Post $model)
    {
        $this->model = $model;
        $this->__dtConstruct($request);
    }

    /**
     * Return a list of posts based on given criteria
     *
     * @return mixed
     */
    public function listAll()
    {
        $query = $this->model->with('author');
        $posts = $this->listData($query);

        return $posts;
    }

}