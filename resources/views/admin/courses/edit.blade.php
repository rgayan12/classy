@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Update course detail')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        {!! Form::model($course, ['method' => 'PUT', 'route' => ['admin.courses.update', $course->id]]) !!}

        @include('admin.courses.form')

        {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop
