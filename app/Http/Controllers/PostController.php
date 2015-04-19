<?php namespace App\Http\Controllers;

use App\DataTableConfigs\PostConfig;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Posts\PostRepositoryInterface;
use Arminsam\Datatable\DataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller {

    protected $postRepository;

    protected $postConfig;

    /**
     * @param PostRepositoryInterface $postRepository
     * @param PostConfig $postConfig
     */
    public function __construct(PostRepositoryInterface $postRepository, PostConfig $postConfig)
    {
        $this->postRepository = $postRepository;
        $this->postConfig = $postConfig;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->postRepository->listAll();
        $dataTable = new DataTable($this->postConfig, $data);

        return view('posts.index', compact('dataTable'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('posts.create');
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
