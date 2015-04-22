<?php namespace App\Http\Controllers\CMS;

use App\DataTableConfigs\PostConfig;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Posts\PostRepositoryInterface;
use Arminsam\Datatable\DataTable;
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

        return view('cms.posts.index', compact('dataTable'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cms.posts.create');
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
	 * @param  string  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->postRepository->showPost($id);

        return view('cms.posts.show', compact('post'));
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
