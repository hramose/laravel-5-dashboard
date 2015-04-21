<?php namespace App\Http\Controllers\CMS;

use App\DataTableConfigs\TagConfig;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Tags\TagRepositoryInterface;
use Arminsam\Datatable\DataTable;
use Illuminate\Support\Facades\Input;

class TagController extends Controller {

    protected $tagRepository;

    protected $tagConfig;

    /**
     * @param TagRepositoryInterface $tagRepository
     * @param TagConfig $tagConfig
     */
    public function __construct(TagRepositoryInterface $tagRepository, TagConfig $tagConfig)
    {
        $this->tagRepository = $tagRepository;
        $this->tagConfig = $tagConfig;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->tagRepository->listAll();
        $dataTable = new DataTable($this->tagConfig, $data);

        return view('cms.tags.index', compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.tags.create');
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
//        $category = $this->tagRepository->showPost($slug);

//        return view('cms.tags.show', compact('post'));
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
