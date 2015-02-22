@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="row-same-height">
            <div class="col-sm-8 col-height">
                <h1 class="display-inline-block space-right15 space-top0">Dashboard</h1>
                <span class="text-muted">header small text goes here...</span>
            </div>

            <div class="col-sm-4 col-height col-middle">
                <ol class="breadcrumb space0">
                    <li><a href="javascript:;"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="javascript:;">Library</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
    </div>

@endsection
