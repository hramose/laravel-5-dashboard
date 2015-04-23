@extends('layouts.master')

@section('content')

    <div class="row space-btm20">
        <div class="col-md-8 text-center-sm">
            @include('components.contentHeader.content-header', [
                'title' => '<i class="fa fa-fw fa-sitemap"></i> Categories'
            ])
        </div>

        <div class="col-md-4 space-top5 text-center-sm">
            @include('components.breadcrumbs.breadcrumbs', [
                'links' => [
                    ['text' => 'Dashboard', 'route' => 'dashboard'],
                    ['text' => 'Categories', 'route' => null]
                ]
            ])
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default data-table">
                <div class="panel-heading">
                    @include('components.partials.panel-header', ['title' => 'Categories list'])
                </div>
                <div class="panel-collapse collapse in">

                    @include('components.dataTable.data-table')

                </div>
            </div>
        </div>

    </div>

@endsection