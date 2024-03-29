@extends('layouts.master')

@section('content')

    <div class="row space-btm20">
        <div class="col-md-8 text-center-sm">
            @include('components.contentHeader.content-header', [
                'title' => 'Dashboard'
            ])
        </div>

        <div class="col-md-4 space-top5 text-center-sm">
            @include('components.breadcrumbs.breadcrumbs', [
                'links' => [
                    ['text' => 'Dashboard', 'route' => null]
                ]
            ])
        </div>
    </div>

    <div class="row">

        <div class="col-md-9 col-md-push-3">
            @include('components.dataTable.data-table', ['title' => 'Test data'])
        </div>

        <div class="col-md-3 col-md-pull-9">
            @include('components.quickStats.quick-stats')
        </div>

    </div>

@endsection
