@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Course list of ')</h3>

    {{ $company->name }}
@stop

@section('javascript')
    <script>


    </script>
@endsection