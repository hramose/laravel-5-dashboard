<?php namespace App\Http\Controllers\CMS;

use App\DataTableConfigs\CommentConfig;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Comments\CommentRepositoryInterface;
use Arminsam\Datatable\DataTable;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller {

    protected $commentRepository;

    protected $commentConfig;

    /**
     * @param CommentRepositoryInterface $commentRepository
     * @param CommentConfig $commentConfig
     */
    public function __construct(CommentRepositoryInterface $commentRepository, CommentConfig $commentConfig)
    {
        $this->commentRepository = $commentRepository;
        $this->commentConfig = $commentConfig;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->commentRepository->listAll();
        $dataTable = new DataTable($this->commentConfig, $data);

        return view('cms.comments.index', compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.comments.create');
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
//        $category = $this->commentRepository->showPost($slug);

//        return view('cms.comments.show', compact('post'));
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
