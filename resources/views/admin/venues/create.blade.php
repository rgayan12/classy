@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Create Venue')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.venues.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        @include('admin.venues.form')

    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop