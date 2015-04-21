<?php namespace App\Http\Controllers;

use App\DataTableConfigs\CategoryConfig;
use App\Http\Requests;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Arminsam\Datatable\DataTable;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller {

    protected $categoryRepository;

    protected $categoryConfig;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     * @param CategoryConfig $categoryConfig
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, CategoryConfig $categoryConfig)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryConfig = $categoryConfig;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->categoryRepository->listAll();
        $dataTable = new DataTable($this->categoryConfig, $data);

        return view('categories.index', compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
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
//        $category = $this->categoryRepository->showPost($slug);

//        return view('categories.show', compact('post'));
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
