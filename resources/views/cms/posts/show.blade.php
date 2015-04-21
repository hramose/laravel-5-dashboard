@extends('layouts.master')

@section('content')

    <div class="row space-btm20">
        <div class="col-md-8 text-center-sm">
            @include('components.contentHeader.content-header', [
                'title' => 'View Post'
            ])
        </div>

        <div class="col-md-4 space-top5 text-center-sm">
            @include('components.breadcrumbs.breadcrumbs', [
                'links' => [
                    ['text' => 'Dashboard', 'route' => 'dashboard'],
                    ['text' => 'Posts', 'route' => 'posts_index'],
                    ['text' => 'View', 'route' => null]
                ]
            ])
        </div>
    </div>

    <div class="row">

        <div class="col-md-9 col-md-push-3 space-btm15">
            <h3 class="space-top0 space-btm20">
                {{ $post->title }}
                <a href="javascript:;" data-toggle="tooltip" title="View On Front-End"><i class="fa fa-globe"></i></a>
            </h3>

            {!! $post->content !!}
        </div>
        <div class="col-md-3 col-md-pull-9">
            <div class="well well-sm overflow-hidden">
                <table class="table table-borderless space0">
                    <tbody>
                    <tr>
                        <th style="width: 40px;"><i class="fa fa-sitemap fa-fw" data-toggle="tooltip" title="Categories"></i> : </th>
                        <td class="pdng-left0">{!! $post->present()->categoriesList !!}</td>

                    </tr>
                    <tr>
                        <th><i class="fa fa-tags fa-fw" data-toggle="tooltip" title="Tags"></i> : </th>
                        <td class="pdng-left0">{!! $post->present()->tagsList !!}</td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-user fa-fw" data-toggle="tooltip" title="Author"></i> : </th>
                        <td class="pdng-left0"><a href="javascript">{{ $post->author->name }}</a></td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-check fa-fw" data-toggle="tooltip" title="Status"></i> : </th>
                        <td class="pdng-left0">
                            <span class="badge {{ $post->status == 'published' ? 'badge-success' : 'badge-default' }}">
                                {{ ucfirst($post->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-clock-o fa-fw" data-toggle="tooltip" title="Created At"></i> : </th>
                        <td class="pdng-left0">{{ $post->created_at->format('Y/m/d h:i A') }}</td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-pencil fa-fw" data-toggle="tooltip" title="Modified At"></i> : </th>
                        <td class="pdng-left0">{{ $post->updated_at->format('Y/m/d h:i A') }}</td>
                    </tr>
                    </tbody>
                </table>
                <hr class="space-top10 space-btm10">
                <a href="javascript:;" class="btn btn-warning btn-block">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </a>
                <a href="javascript:;" class="btn btn-danger btn-block">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </a>
            </div>
        </div>

    </div>

@endsection