<div class="panel-body">
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('name', trans('Name').'', ['class' => 'control-label']) !!}
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
            {!! Form::label('address', trans('Address').'', ['class' => 'control-label']) !!}
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
            {!! Form::label('address_option', trans('Address (Optional').'', ['class' => 'control-label']) !!}
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
            {!! Form::label('city', trans('City').'', ['class' => 'control-label']) !!}
            {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('city'))
                <p class="help-block">
                    {{ $errors->first('city') }}
                </p>
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('province_id', trans('County').'', ['class' => 'control-label']) !!}
            {!! Form::select('province_id', $province,  old('province_id'), ['class' => 'form-control select2']) !!}
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
            {!! Form::label('country_id', trans('Country').'', ['class' => 'control-label']) !!}
            {!! Form::select('country_id', $country,  old('country_id'), ['class' => 'form-control select2']) !!}
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
            {!! Form::label('status', trans('Status').'', ['class' => 'control-label']) !!}
            {!! Form::select('status', array('1' => 'Open','0' => 'Closes'),  old('status'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('status'))
                <p class="help-block">
                    {{ $errors->first('status') }}
                </p>
            @endif
        </div>
    </div>
    {!! Form::hidden('created_by', $user, old('created_by') ,['class' => 'form-control']) !!}
</div>
