@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('New audition')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.auditions.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        @include('admin.auditions.form')
        {!! Form::hidden('owner', $owner, old('owner'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

