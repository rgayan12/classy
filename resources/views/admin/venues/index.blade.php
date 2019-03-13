@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Venues')</h3>
    @can('venue_create')
    <p>
        <a href="{{ route('admin.venues.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

    </p>
    @endcan

    @can('venue_delete')
    <p>
    <ul class="list-inline">
        <li><a href="{{ route('admin.venues.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
        <li><a href="{{ route('admin.venues.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
    </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($venues) > 0 ? 'datatable' : '' }} @can('venue_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('venue_delete')
                    @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                    @endcan

                    <th>@lang('Name')</th>
                    <th>@lang('Address')</th>
                    <th>@lang('Post Code')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($venues) > 0)
                    @foreach ($venues as $venue)
                        <tr data-entry-id="{{ $venue->id }}">
                            @can('venue_delete')
                            @if ( request('show_deleted') != 1 )<td></td>@endif
                            @endcan

                            <td field-key='name'>{{ $venue->name }}</td>
                            <td field-key='address'>{{ $venue->address }}</td>
                            <td field-key='city'>{{ $venue->postal_code }}</td>

                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('venue_delete')
                                    {!! Form::open(array(
    'style' => 'display: inline-block;',
    'method' => 'POST',
    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
    'route' => ['admin.venues.restore', $venue->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                    @can('venue_delete')
                                    {!! Form::open(array(
    'style' => 'display: inline-block;',
    'method' => 'DELETE',
    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
    'route' => ['admin.venues.perma_del', $venue->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    @can('venue_view')
                                    <div>
                                        <a href="{{ route('admin.venues.show',[$venue->id]) }}" class="btn btn-sm btn-primary">@lang('Manage')</a>
                                    </div>
                                    @endcan
                                    @can('venue_edit')
                                    <div>
                                        <a href="{{ route('admin.venues.edit',[$venue->id]) }}" class="btn btn-sm btn-info">@lang('quickadmin.qa_edit')</a>
                                    </div>
                                    @endcan
                                    @can('venue_delete')
                                    <div>
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.venues.destroy', $venue->id])) !!}
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
        @can('venue_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.companies.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection