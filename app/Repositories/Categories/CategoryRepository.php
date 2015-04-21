<?php namespace App\Repositories\Categories;

use App\Category;
use Arminsam\Datatable\DataTableTrait;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface {

    use DataTableTrait {
        DataTableTrait::__construct as private __dtConstruct;
    }

    protected $model;

    /**
     * @param Request $request
     * @param Category $model
     */
    public function __construct(Request $request, Category $model)
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
        $query = $this->model->leftJoin('categories as parent', 'parent.id', '=', 'categories.parent_id')->with('parent');
        $posts = $this->listData($query);

        return $posts;
    }

}