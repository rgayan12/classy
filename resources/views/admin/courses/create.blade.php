@extends('layouts.app')


@section('content')
    <h3 class="page-title">@lang('New Course') </h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.courses.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        @include('admin.courses.form')
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@stop