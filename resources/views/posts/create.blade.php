@extends('layouts.master')

@section('content')

    <div class="row space-btm20">
        <div class="col-md-8 text-center-sm">
            @include('components.contentHeader.content-header', [
                'title' => 'Create Posts'
            ])
        </div>

        <div class="col-md-4 space-top5 text-center-sm">
            @include('components/breadcrumbs/breadcrumbs', [
                'links' => [
                    ['text' => 'Dashboard', 'route' => 'dashboard'],
                    ['text' => 'Posts', 'route' => 'posts_index'],
                    ['text' => 'Create', 'route' => null]
                ]
            ])
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @include('components.partials.panel-header', ['title' => 'Create a new post'])
                </div>
                <div class="panel-collapse collapse in">
                    <!-- New post form -->
                    {!! Form::open([
                        'url' => '#',
                        'class' => 'form-horizontal',
                    ]) !!}
                        <div class="panel-body border-btm1">
                            <!-- Title input -->
                            <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
                                {!! Form::label('title', 'Title', [
                                    'class' => 'col-sm-3 control-label required'
                                ]) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('title', Input::old('title'), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Title'
                                    ]) !!}
                                </div>
                            </div>

                            <!-- Content input -->
                            <div class="form-group {{ $errors->first('post_content') ? 'has-error' : '' }}">
                                {!! Form::label('post_content', 'Content', [
                                    'class' => 'col-sm-3 control-label'
                                ]) !!}
                                <div class="col-sm-9">
                                    {!! Form::textarea('post_content', Input::old('post_content'), [
                                        'data-plugin' => 'summernote',
                                        'class' => 'form-control',
                                        'placeholder' => 'Content',
                                        'rows' => 5
                                    ]) !!}
                                </div>
                            </div>

                            <!-- Categories input -->
                            <div class="form-group {{ $errors->first('categories') ? 'has-error' : '' }}">
                                {!! Form::label('categories', 'Categories', [
                                    'class' => 'col-sm-3 control-label'
                                ]) !!}
                                <div class="col-sm-9">
                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('categories', 'general', (Input::old('categories') == 'general')) !!} General
                                    </label>
                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('categories', 'holidays', (Input::old('categories') == 'holidays')) !!} Holidays
                                    </label>
                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('categories', 'sport', (Input::old('categories') == 'sport')) !!} Sport
                                    </label>
                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('categories', 'literature', (Input::old('categories') == 'literature')) !!} Literature
                                    </label>
                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('categories', 'pets', (Input::old('categories') == 'pets')) !!} Pets
                                    </label>
                                    <div class="checkbox-inline">
                                        <button class="btn btn-xs"><i class="fa fa-plus"></i> Add New</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Tags input -->
                            <div class="form-group space-btm0 {{ $errors->first('tags') ? 'has-error' : '' }}">
                                {!! Form::label('tags', 'Tags', [
                                    'class' => 'col-sm-3 control-label'
                                ]) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('tags', Input::old('tags'), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Tags',
                                        'data-role' => 'tagsinput'
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        <section class="pdng15">
                            <!-- Submit form -->
                            <div class="form-group space-btm0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Publish</button>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#"><i class="fa fa-save"></i> Save As Draft</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-default">Preview</button>
                                </div>
                            </div>
                        </section>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection