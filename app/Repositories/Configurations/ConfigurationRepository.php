<?php namespace App\Repositories\Configurations;

use App\Configuration;
use Illuminate\Http\Request;

class ConfigurationRepository implements ConfigurationRepositoryInterface {

    protected $model;

    /**
     * @param Request $request
     * @param Configuration $model
     */
    public function __construct(Request $request, Configuration $model)
    {
        $this->model = $model;
    }

    /**
     * Return a list of configurations based on given criteria
     *
     * @return mixed
     */
    public function listAll()
    {
        return $this->model->all();
    }

}