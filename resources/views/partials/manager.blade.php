@inject('request', 'Illuminate\Http\Request')
        <!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">



            <li class="{{ $request->segment(2) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/manage') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('company_access')
            <li class="{{ $request->segment(2) == 'companies' ? 'active' : '' }}">
                <a href="{{ route('admin.companies.show',[$company->id]) }}">
                    <i class="fa fa-building"></i>
                    <span class="title">@lang('My School')</span>
                </a>
            </li>
            @endcan
            @can('venue_access')
            <li class="{{ $request->segment(2) == 'venues' ? 'active' : '' }}">
                <a href="{{ route('admin.venues.index') }}">
                    <i class="fa fa-thumbtack"></i>
                    <span class="title">@lang('Venues')</span>
                </a>
            </li>
            @endcan

            @can('audition_access')
            <li class="{{ $request->segment(2) == 'auditions' ? 'active' : '' }}">
                <a href="{{ route('admin.auditions.index') }}">
                    <i class="fa fa-hand-point-right"></i>
                    <span class="title">@lang('Auditions')</span>
                </a>
            </li>
            @endcan

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
