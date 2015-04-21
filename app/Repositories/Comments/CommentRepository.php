<?php namespace App\Repositories\Comments;

use App\Comment;
use Arminsam\Datatable\DataTableTrait;
use Illuminate\Http\Request;

class CommentRepository implements CommentRepositoryInterface {

    use DataTableTrait {
        DataTableTrait::__construct as private __dtConstruct;
    }

    protected $model;

    /**
     * @param Request $request
     * @param Comment $model
     */
    public function __construct(Request $request, Comment $model)
    {
        $this->model = $model;
        $this->__dtConstruct($request);
    }

    /**
     * Return a list of comments based on given criteria
     *
     * @return mixed
     */
    public function listAll()
    {
        $query = $this->model->leftJoin('users as author', 'author.id', '=', 'user_id')
            ->join('posts as post', 'post.id', '=', 'commentable_id')->with('author', 'commentable');
        $comments = $this->listData($query);

        return $comments;
    }

}