<?php namespace Arminsam\Datatable;

use Illuminate\Http\Request;

trait DataTableTrait {

    protected $tableName;

    protected $limit;

    protected $sort;

    protected $sortDirection;

    protected $search;

    protected $searchColumn;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->tableName = $this->model->getTable();
        $this->limit = $request->has('limit') ? (int) $request->get('limit') : 10;
        $this->sort = $request->has('sort') ? $request->get('sort') : $this->tableName . '.id';
        $this->sortDirection = $request->has('order') ? $request->get('order') : 'ASC';
        $this->search = $request->has('search') ? $request->get('search') : [];
        $this->searchColumn = $request->has('searchColumn') ? $request->get('searchColumn') : $this->tableName . '.id';
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function listData($query)
    {
        foreach ($this->search as $column => $search)
        {
            $query = $query->{'of' . ucfirst(camel_case(str_replace('.', '_', $column)))}($search);
        }

        return $query
            ->orderBy($this->sort, $this->sortDirection)
            ->select($this->tableName . '.*')
            ->paginate($this->limit);
    }

}
