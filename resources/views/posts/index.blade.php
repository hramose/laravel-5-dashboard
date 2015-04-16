@extends('layouts.master')

@section('content')

    <div class="row space-btm20">
        <div class="col-md-8 text-center-sm">
            @include('components.contentHeader.content-header', [
                'title' => 'Posts'
            ])
        </div>

        <div class="col-md-4 space-top5 text-center-sm">
            @include('components/breadcrumbs/breadcrumbs', [
                'links' => [
                    ['text' => 'Dashboard', 'route' => 'dashboard'],
                    ['text' => 'Posts', 'route' => null]
                ]
            ])
        </div>
    </div>

    <div class="row">

        <div class="col-md-9 col-md-push-3">
            <div class="panel panel-default data-table">
                <div class="panel-heading">
                    @include('components.partials.panel-header', ['title' => 'Posts list'])
                </div>
                <div class="panel-collapse collapse in">
                    @include('components.partials.data-table-header', [
                        'columns' => [
                            'title' => 'Title',
                            'content' => 'Content',
                            'author.name' => 'Author',
                            'status' => 'Status',
                            'created_at' => 'Published At'
                        ]
                    ])
                    <div class="table-responsive">
                        <table class="table table-striped border-btm1 data-table">
                            <thead>
                            <tr class="filters">
                                <th></th>
                                <th></th>
                                <th><input type="text" class="form-control input-sm" placeholder="Search" name="search" value="{{ Input::get('search') }}"></th>
                                <th><input type="text" class="form-control input-sm" placeholder="Search" name="search" value="{{ Input::get('search') }}"></th>
                                <th><input type="text" class="form-control input-sm" placeholder="Search" name="search" value="{{ Input::get('search') }}"></th>
                                <th><input type="text" class="form-control input-sm" placeholder="Search" name="search" value="{{ Input::get('search') }}"></th>
                                <th><input type="text" class="form-control input-sm" placeholder="Search" name="search" value="{{ Input::get('search') }}"></th>
                            </tr>
                            <tr>
                                <th><input type="checkbox" class="select-row"></th>
                                <th></th>
                                @if (!Input::has('columns') || in_array('title', Input::get('columns')))
                                <th><a class="sortable {{ Input::get('sort') == 'title' ? Input::get('order') : '' }}" data-value="title" href="javascript:;">
                                        <i class="fa {{ Input::get('sort') == 'title' ? (Input::get('order') == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc') : 'fa-sort' }}"></i> Title
                                </a></th>
                                @endif
                                @if (!Input::has('columns') || in_array('content', Input::get('columns')))
                                <th><a class="sortable {{ Input::get('sort') == 'content' ? Input::get('order') : '' }}" data-value="content" href="javascript:;">
                                        <i class="fa {{ Input::get('sort') == 'content' ? (Input::get('order') == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc') : 'fa-sort' }}"></i> Content
                                </a></th>
                                @endif
                                @if (!Input::has('columns') || in_array('author.name', Input::get('columns')))
                                <th><a class="sortable {{ Input::get('sort') == 'author.name' ? Input::get('order') : '' }}" data-value="author.name" href="javascript:;">
                                        <i class="fa {{ Input::get('sort') == 'author.name' ? (Input::get('order') == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc') : 'fa-sort' }}"></i> Author
                                </a></th>
                                @endif
                                @if (!Input::has('columns') || in_array('status', Input::get('columns')))
                                <th><a class="sortable {{ Input::get('sort') == 'status' ? Input::get('order') : '' }}" data-value="status" href="javascript:;">
                                        <i class="fa {{ Input::get('sort') == 'status' ? (Input::get('order') == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc') : 'fa-sort' }}"></i> Status
                                </a></th>
                                @endif
                                @if (!Input::has('columns') || in_array('created_at', Input::get('columns')))
                                <th><a class="sortable {{ Input::get('sort') == 'created_at' ? Input::get('order') : '' }}" data-value="created_at" href="javascript:;">
                                        <i class="fa {{ Input::get('sort') == 'created_at' ? (Input::get('order') == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc') : 'fa-sort' }}"></i> Published At
                                </a></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $index => $post)
                                <tr>
                                    <th><input type="checkbox" class="select-row"></th>
                                    <td>{{ $post->present()->counter($posts->perPage(), $posts->currentPage(), $index) }}</td>
                                    @if (!Input::has('columns') || in_array('title', Input::get('columns')))
                                    <td>{!! link_to_route('post_show', $post->present()->postTitle, $post->slug) !!}</td>
                                    @endif
                                    @if (!Input::has('columns') || in_array('content', Input::get('columns')))
                                    <td>{{ $post->present()->postContent }}</td>
                                    @endif
                                    @if (!Input::has('columns') || in_array('author.name', Input::get('columns')))
                                    <td>{{ $post->author->name }}</td>
                                    @endif
                                    @if (!Input::has('columns') || in_array('status', Input::get('columns')))
                                    <td>{{ $post->present()->postStatus }}</td>
                                    @endif
                                    @if (!Input::has('columns') || in_array('created_at', Input::get('columns')))
                                    <td>{{ $post->present()->publishedAt }}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($posts->total() > $posts->count())
                    <section class="border-top1 pdng15">
                        <div class="row">
                            <div class="col-sm-6 space-btm15-sm text-center-sm space-top10 space-top0-sm">
                                Showing {{ ($posts->perPage() * ($posts->currentPage() - 1) + 1) }}
                                to {{ $posts->hasMorePages() ? $posts->perPage() * $posts->currentPage() : $posts->total() }}
                                of {{ $posts->total() }} entries
                            </div>
                            <div class="col-sm-6 text-center-sm text-right">
                                {!! $posts->render() !!}
                            </div>
                        </div>
                    </section>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-3 col-md-pull-9">
            @include('components/quickStats/quick-stats', ['model' => \App\Post::class])
        </div>

    </div>

@endsection