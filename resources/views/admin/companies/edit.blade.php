@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.companies.title')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>
    
    {!! Form::model($company, ['method' => 'PUT', 'route' => ['admin.companies.update', $company->id], 'files' => true,]) !!}

    @include('admin.companies.form')


    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>
@stop

