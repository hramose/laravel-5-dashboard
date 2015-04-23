<?php namespace App\Repositories\Configurations;

use App\Configuration;
use Arminsam\Datatable\DataTableTrait;
use Illuminate\Http\Request;

class ConfigurationRepository implements ConfigurationRepositoryInterface {

    use DataTableTrait {
        DataTableTrait::__construct as private __dtConstruct;
    }

    protected $model;

    /**
     * @param Request $request
     * @param Configuration $model
     */
    public function __construct(Request $request, Configuration $model)
    {
        $this->model = $model;
        $this->__dtConstruct($request);
    }

    /**
     * Return a list of configuration options based on given criteria
     *
     * @return mixed
     */
    public function listAll()
    {
        $configurations = $this->listData($this->model);

        return $configurations;
    }

    /**
     * Return all configuration options
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

}