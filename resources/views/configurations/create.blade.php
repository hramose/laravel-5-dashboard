@extends('layouts.master')

@section('content')

    <div class="row space-btm20">
        <div class="col-md-8 text-center-sm">
            @include('components.contentHeader.content-header', [
                'title' => '<i class="fa fa-fw fa-wrench"></i> App Configuration',
                'subTitle' => 'Add a New Option'
            ])
        </div>

        <div class="col-md-4 space-top5 text-center-sm">
            @include('components.breadcrumbs.breadcrumbs', [
                'links' => [
                    ['text' => 'Dashboard', 'route' => 'dashboard'],
                    ['text' => 'Configuration', 'route' => 'configurations_index'],
                    ['text' => 'Add Option', 'route' => null]
                ]
            ])
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @include('components.partials.panel-header', ['title' => 'Add a new option'])
                </div>
                <div class="panel-collapse collapse in">
                    <!-- New post form -->
                    {!! Form::open([
                        'url' => '#',
                        'class' => 'form-horizontal',
                    ]) !!}
                    <div class="panel-body border-btm1 pdng-btm0">
                        <!-- Label input -->
                        <div class="form-group {{ $errors->first('label') ? 'has-error' : '' }}">
                            {!! Form::label('label', 'Option Label', [
                                'class' => 'col-sm-3 control-label required'
                            ]) !!}
                            <div class="col-sm-9">
                                {!! Form::text('label', Input::old('label'), [
                                    'class' => 'form-control',
                                    'placeholder' => 'Option label'
                                ]) !!}
                            </div>
                        </div>

                        <!-- Key input -->
                        <div class="form-group {{ $errors->first('key') ? 'has-error' : '' }}">
                            {!! Form::label('key', 'Option Key', [
                                'class' => 'col-sm-3 control-label'
                            ]) !!}
                            <div class="col-sm-9">
                                {!! Form::text('key', Input::old('key'), [
                                    'class' => 'form-control',
                                    'placeholder' => 'Option key'
                                ]) !!}
                                <p class="help-block text-info">We will use <code>snake_case</code> of Option Label if you leave this field blank.</p>
                            </div>
                        </div>

                        <!-- Type input -->
                        <div class="form-group {{ $errors->first('type') ? 'has-error' : '' }}">
                            {!! Form::label('type', 'Option Type', [
                                'class' => 'col-sm-3 control-label required'
                            ]) !!}
                            <div class="col-sm-9">
                                {!! Form::select('type', ['' => '--Option type--'] + [
                                    'textbox' => 'Text', 'textarea' => 'Paragraph', 'wysiwyg' => 'WYSIWYG',
                                    'date' => 'Date', 'time' => 'Time', 'datetime' => 'Date/Time',
                                    'number' => 'Number', 'checkbox' => 'Checkbox', 'radio' => 'Radio',
                                    'select' => 'Dropdown Menu', 'multiple' => 'Multiple Select', 'file' => 'File'
                                ], Input::old('type'), [
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                        </div>

                        <!-- Options input -->
                        <div class="form-group {{ $errors->first('Options') ? 'has-error' : '' }}">
                            {!! Form::label('Options', 'Multiple Select Options', [
                                'class' => 'col-sm-3 control-label'
                            ]) !!}
                            <div class="col-sm-9">
                                <button class="btn btn-xs" style="margin-top: 7px;"><i class="fa fa-plus"></i> Add New</button>
                                <p class="help-block">Add options only if you select <code>Checkbox</code>, <code>Radio</code>, <code>Dropdown Menu</code> or <code>Multiple Select</code> for Option Type.</p>
                            </div>
                        </div>
                    </div>

                    <section class="pdng15">
                        <!-- Submit form -->
                        <div class="form-group space-btm0">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="button" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Add</button>
                            </div>
                        </div>
                    </section>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection