@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('New Venue')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.companies.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        @include('admin.companies.form')
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

