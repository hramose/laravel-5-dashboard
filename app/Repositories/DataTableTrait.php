<?php namespace App\Repositories;

use Illuminate\Http\Request;

trait DataTableTrait {

    protected $limit;

    protected $orderBy;

    protected $search;

    protected $searchColumn;

    protected $shownColumns;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->limit = $request->has('limit') ? (int) $request->get('limit') : 10;
        $this->orderBy = $request->has('orderBy') ? $request->get('orderBy') : 'created_at';
        $this->search = $request->has('search') ? $request->get('search') : '';
        $this->searchColumn = $request->has('searchColumn') ? $request->get('searchColumn') : 'id';
        $this->shownColumns = $request->has('shownColumns') ? $request->get('shownColumns') : null;
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function listData($query)
    {
        return $query->orderBy($this->orderBy)->paginate($this->limit);
    }

}
