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
            <div class="panel panel-default">
                <div class="panel-heading">
                    @include('components.partials.panel-header', ['title' => 'Posts list'])
                </div>
                <div class="panel-collapse collapse in">
                    @include('components.partials.data-table-header', [
                        'columns' => ['Title', 'Content', 'Author', 'Status', 'Published At']
                    ])
                    <div class="table-responsive">
                        <table class="table table-striped border-btm1">
                            <thead>
                            <tr>
                                <th></th>
                                <th><a class="sortable" href="{{ route('posts', ['order' => 'title']) }}">
                                        <i class="fa fa-sort"></i> Title
                                </a></th>
                                <th><a class="sortable" href="{{ route('posts', ['order' => 'content']) }}">
                                        <i class="fa fa-sort"></i> Content
                                </a></th>
                                <th><a class="sortable" href="{{ route('posts', ['order' => 'author.name']) }}">
                                        <i class="fa fa-sort"></i> Author
                                </a></th>
                                <th><a class="sortable" href="{{ route('posts', ['order' => 'status']) }}">
                                        <i class="fa fa-sort"></i> Status
                                </a></th>
                                <th><a class="sortable" href="{{ route('posts', ['order' => 'created_at']) }}">
                                        <i class="fa fa-sort"></i> Published At
                                </a></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $index => $post)
                                <tr>
                                    <td>{{ $post->present()->counter($posts->perPage(), $posts->currentPage(), $index) }}</td>
                                    <td>{!! link_to_route('post_show', $post->present()->postTitle, $post->slug) !!}</td>
                                    <td>{{ $post->present()->postContent }}</td>
                                    <td>{{ $post->author->name }}</td>
                                    <td>{{ $post->present()->postStatus }}</td>
                                    <td>{{ $post->present()->publishedAt }}</td>
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