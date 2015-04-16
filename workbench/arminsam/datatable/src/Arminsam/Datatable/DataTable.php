<?php namespace Arminsam\Datatable;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DataTable {

    public $columns;

    public $data;

    /**
     * @param DataTableConfigInterface $config
     * @param $data
     */
    public function __construct(DataTableConfigInterface $config, LengthAwarePaginator $data)
    {
        $this->columns = $config->getColumns();
        $this->data = $data;
    }

}