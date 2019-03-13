@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Audition')</h3>
    @can('audition_create')
    <p>
        <a href="{{ route('admin.auditions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

    </p>
    @endcan

    @can('audition_delete')
    <p>
    <ul class="list-inline">
        <li><a href="{{ route('admin.auditions.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
        <li><a href="{{ route('admin.auditions.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
    </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($auditions) > 0 ? 'datatable' : '' }} @can('audition_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('audition_delete')
                    @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                    @endcan

                    <th>@lang('Name')</th>
                    <th>@lang('Veneu')</th>
                    <th>@lang('Date Time')</th>
                    <th>@lang('Category')</th>
                    <th>@lang('School')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($auditions) > 0)
                    @foreach ($auditions as $audition)
                        <tr data-entry-id="{{ $audition->id }}">
                            @can('audition_delete')
                            @if ( request('show_deleted') != 1 )<td></td>@endif
                            @endcan

                            <td field-key='name'>{{ $audition->name }}</td>
                            <td field-key='venue_id'>{{ $audition->venues->name }}</td>
                            <td field-key='date_time'>{{ $audition->audition_date .' '. $audition->audition_time}}</td>
                            <td field-key='categories'>
                                @foreach ($audition->categories as $singleCategories)
                                    <span class="label label-info label-many">{{ $singleCategories->name }}</span>
                                @endforeach
                            </td>
                            <td field-key='companies'>
                                @foreach ($audition->companies as $singleCompany)
                                    <span class="label label-info label-many">{{ $singleCompany->name }}</span>
                                @endforeach
                            </td>

                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('audition_delete')
                                    {!! Form::open(array(
    'style' => 'display: inline-block;',
    'method' => 'POST',
    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
    'route' => ['admin.auditions.restore', $audition->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                    @can('audition_delete')
                                    {!! Form::open(array(
    'style' => 'display: inline-block;',
    'method' => 'DELETE',
    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
    'route' => ['admin.auditions.perma_del', $audition->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    @can('audition_view')
                                    <div>
                                        <a href="{{ route('admin.auditions.show',[$audition->id]) }}" class="btn btn-sm btn-primary">@lang('Manage')</a>
                                    </div>
                                    @endcan
                                    @can('audition_edit')
                                    <div>
                                        <a href="{{ route('admin.auditions.edit',[$audition->id]) }}" class="btn btn-sm btn-info">@lang('quickadmin.qa_edit')</a>
                                    </div>
                                    @endcan
                                    @can('audition_delete')
                                    <div>
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.auditions.destroy', $audition->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-sm btn-danger')) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('audition_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.companies.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection