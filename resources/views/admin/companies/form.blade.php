<div class="panel-body">
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('name', trans('quickadmin.companies.fields.name').'', ['class' => 'control-label']) !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('city_id', trans('quickadmin.companies.fields.city').'', ['class' => 'control-label']) !!}
            {!! Form::select('city_id', $cities, old('city_id'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('city_id'))
                <p class="help-block">
                    {{ $errors->first('city_id') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('categories', trans('quickadmin.companies.fields.categories').'', ['class' => 'control-label']) !!}
            {!! Form::select('categories[]', $categories, old('categories'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
            <p class="help-block"></p>
            @if($errors->has('categories'))
                <p class="help-block">
                    {{ $errors->first('categories') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('address', trans('quickadmin.companies.fields.address').'', ['class' => 'control-label']) !!}
            {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('address'))
                <p class="help-block">
                    {{ $errors->first('address') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('address_option', trans('Address (optional)').'', ['class' => 'control-label']) !!}
            {!! Form::text('address_option', old('address_option'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('address_option'))
                <p class="help-block">
                    {{ $errors->first('address_option') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('town_city', trans('Town').'', ['class' => 'control-label']) !!}
            {!! Form::text('town_city', old('town_city'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('town_city'))
                <p class="help-block">
                    {{ $errors->first('town_city') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('postal_code', trans('Postal Code').'', ['class' => 'control-label']) !!}
            {!! Form::text('postal_code', old('postal_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('postal_code'))
                <p class="help-block">
                    {{ $errors->first('postal_code') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('province_id', trans('quickadmin.companies.fields.province').'', ['class' => 'control-label']) !!}
            {!! Form::select('province_id', $province, old('province_id'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('province_id'))
                <p class="help-block">
                    {{ $errors->first('province_id') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('country_id', trans('Country').'', ['class' => 'control-label']) !!}
            {!! Form::select('country_id', $country, old('country_id'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('country_id'))
                <p class="help-block">
                    {{ $errors->first('country_id') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('description', trans('quickadmin.companies.fields.description').'', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('description'))
                <p class="help-block">
                    {{ $errors->first('description') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('logo', trans('quickadmin.companies.fields.logo').'', ['class' => 'control-label']) !!}
            {!! Form::hidden('logo', old('logo')) !!}
            {!! Form::file('logo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
            {!! Form::hidden('logo_max_size', 5) !!}
            {!! Form::hidden('logo_max_width', 4096) !!}
            {!! Form::hidden('logo_max_height', 4096) !!}
            <p class="help-block"></p>
            @if($errors->has('logo'))
                <p class="help-block">
                    {{ $errors->first('logo') }}
                </p>
            @endif
        </div>
    </div>

</div>
