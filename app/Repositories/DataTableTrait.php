<?php namespace App\Repositories;

use Illuminate\Http\Request;

trait DataTableTrait {

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
        $this->limit = $request->has('limit') ? (int) $request->get('limit') : 10;
        $this->sort = $request->has('sort') ? $request->get('sort') : 'created_at';
        $this->sortDirection = $request->has('order') ? $request->get('order') : 'id';
        $this->search = $request->has('search') ? $request->get('search') : '';
        $this->searchColumn = $request->has('searchColumn') ? $request->get('searchColumn') : 'id';
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function listData($query)
    {
        $relationships = $this->getRelationships();
        return $query
            ->where($this->searchColumn, 'LIKE', '%'.$this->search.'%')
            ->orderBy($this->sort, $this->sortDirection)
            ->paginate($this->limit);
    }

    private function getRelationships()
    {
        $relationships = [];
        $sortColumn = explode('.', $this->sort);
        $searchColumn = explode('.', $this->searchColumn);

        if (count($sortColumn) > 2 || count($searchColumn) > 2)
        {
            die('Relationships wirh depth more than two are not supported at the moment!');
        }

        if (isset($sortColumn[1]))
        {
            $relationships[] = $sortColumn[0];
        }

        if (isset($searchColumn[1]))
        {
            $relationships[] = $searchColumn[0];
        }

        return $relationships;
    }

}
