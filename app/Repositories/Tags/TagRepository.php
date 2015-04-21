<?php namespace App\Repositories\Tags;

use App\Tag;
use Arminsam\Datatable\DataTableTrait;
use Illuminate\Http\Request;

class TagRepository implements TagRepositoryInterface {

    use DataTableTrait {
        DataTableTrait::__construct as private __dtConstruct;
    }

    protected $model;

    /**
     * @param Request $request
     * @param Tag $model
     */
    public function __construct(Request $request, Tag $model)
    {
        $this->model = $model;
        $this->__dtConstruct($request);
    }

    /**
     * Return a list of categories based on given criteria
     *
     * @return mixed
     */
    public function listAll()
    {
        $query = $this->model->with('posts');
        $tags = $this->listData($query);

        return $tags;
    }

}