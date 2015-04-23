@extends('layouts.master')

@section('content')

    <div class="row space-btm20">
        <div class="col-md-8 text-center-sm">
            @include('components.contentHeader.content-header', [
                'title' => '<i class="fa fa-fw fa-wrench"></i> App Configuration'
            ])
        </div>

        <div class="col-md-4 space-top5 text-center-sm">
            @include('components.breadcrumbs.breadcrumbs', [
                'links' => [
                    ['text' => 'Dashboard', 'route' => 'dashboard'],
                    ['text' => 'Configuration', 'route' => null]
                ]
            ])
        </div>
    </div>

    <div class="row">

        <div class="col-md-9 col-md-push-3 space-btm15">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @include('components.partials.panel-header', ['title' => 'Configuration options'])
                </div>
                <div class="panel-collapse collapse in">
                    <!-- New post form -->
                    {!! Form::open([
                        'url' => '#',
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}
                        <div class="panel-body border-btm1">
                        @foreach ($data as $config)
                            <div class="form-group {{ $errors->first($config->key) ? 'has-error' : '' }}">
                                {!! Form::label($config->key, $config->label, [
                                    'class' => 'col-sm-3 control-label'
                                ]) !!}
                                <div class="col-sm-9">
                                    @include('components.inputGenerator.'.$config->type, [
                                        'name' => $config->key,
                                        'placeholder' => $config->label,
                                        'value' => Input::old($config->key) ?: $config->value,
                                        'options' => $config->options
                                    ])
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <section class="pdng15">
                            <!-- Submit form -->
                            <div class="form-group space-btm0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="button" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </section>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-pull-9">
            <div class="well well-sm overflow-hidden">
                <div>
                    <h4>INSTRUCTION</h4>
                    <p>Configuration options are globally accessible values that can be used to customize
                        your application behaviour.</p>
                    <p>You can easily define new options of various types and use them in your code via the
                        following helper method: <code>site_config('site.option')</code>.</p>
                </div>
                <hr class="space-top10 space-btm10">
                <a href="{{ route('configuration_create') }}" class="btn btn-success btn-block">
                    <span class="glyphicon glyphicon-plus"></span> Add New Option
                </a>
                <a href="{{ route('configurations_manage') }}" class="btn btn-warning btn-block">
                    <span class="glyphicon glyphicon-edit"></span> Manage Options
                </a>
            </div>
        </div>

    </div>

@endsection