<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav mr-auto">
            <li class="nav-item active">
                <a href="{{ route('admin.companies.edit',[$company->id]) }}" class="btn btn-sm btn-info">@lang('quickadmin.qa_edit')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.courses.create',['school' => $company->id]) }}" class="btn btn-sm btn-info">Course</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.companies.create',['school' => $company->id]) }}" class="btn btn-sm btn-info">Manager</a>
            </li>
            <li class="nav-item dropdown">

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>


                    <a href="{{ route('admin.companies.edit',[$company->id]) }}" class="btn btn-sm btn-info">@lang('quickadmin.qa_edit')</a>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>

    </div>
</nav>