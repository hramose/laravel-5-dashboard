<?php namespace App\Repositories\Posts;

use App\Post;
use Arminsam\Datatable\DataTableTrait;
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
        $query = $this->model->join('users as author', 'author.id', '=', 'user_id')->with('author');
        $posts = $this->listData($query);

        return $posts;
    }

    /**
     * Return a single post based on the given slug
     *
     * @param $slug
     *
     * @return App\Post
     */
    public function showPost($slug)
    {
        return $this->model
            ->with('categories', 'tags')
            ->where('slug', $slug)
            ->firstOrFail();
    }
}