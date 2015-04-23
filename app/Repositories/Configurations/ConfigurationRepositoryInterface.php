<?php namespace App\Repositories\Configurations;

interface ConfigurationRepositoryInterface {

    /**
     * Return a list of configurations based on given criteria
     *
     * @return mixed
     */
    public function listAll();

}