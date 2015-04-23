<?php namespace App\Http\Controllers;

use App\DataTableConfigs\ConfigurationConfig;
use App\Http\Requests;
use App\Repositories\Configurations\ConfigurationRepositoryInterface;
use Arminsam\Datatable\DataTable;
use Illuminate\Support\Facades\Input;

class ConfigurationController extends Controller {

    protected $configurationRepository;

    protected $configurationConfig;

    /**
     * @param ConfigurationRepositoryInterface $configurationRepository
     * @param ConfigurationConfig $configurationConfig
     */
    public function __construct(ConfigurationRepositoryInterface $configurationRepository, ConfigurationConfig $configurationConfig)
    {
        $this->configurationRepository = $configurationRepository;
        $this->configurationConfig = $configurationConfig;
    }

    /**
     * Display a listing of the resource without manage options.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->configurationRepository->getAll();

        return view('configurations.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function manage()
    {
        $data = $this->configurationRepository->listAll();
        $dataTable = new DataTable($this->configurationConfig, $data);

        return view('configurations.manage', compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('configurations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
