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
            {!! Form::label('venue_id', trans('Venue').'', ['class' => 'control-label']) !!}
            {!! Form::select('venue_id', $venues, old('venues'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('venues'))
                <p class="help-block">
                    {{ $errors->first('venues') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('audition_date', trans('Audition Date').'', ['class' => 'control-label']) !!}
            {!! Form::date('audition_date', old('audition_date'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('audition_date'))
                <p class="help-block">
                    {{ $errors->first('audition_date') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('audition_time', trans('Audition Time').'', ['class' => 'control-label']) !!}
            {!! Form::time('audition_time', old('audition_time'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('audition_time'))
                <p class="help-block">
                    {{ $errors->first('audition_time') }}
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
            {!! Form::label('companies', trans('School').'', ['class' => 'control-label']) !!}
            {!! Form::select('companies[]', $companies, old('companies'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
            <p class="help-block"></p>
            @if($errors->has('companies'))
                <p class="help-block">
                    {{ $errors->first('venues') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('fees', trans('Fees').'', ['class' => 'control-label']) !!}
            {!! Form::text('fees', old('fees'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('fees'))
                <p class="help-block">
                    {{ $errors->first('fees') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('seat', trans('Quota').'', ['class' => 'control-label']) !!}
            {!! Form::text('seat', old('seat'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('seat'))
                <p class="help-block">
                    {{ $errors->first('seat') }}
                </p>
            @endif
        </div>
    </div>




    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('details', trans('About').'', ['class' => 'control-label']) !!}
            {!! Form::textarea('details', old('details'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('details'))
                <p class="help-block">
                    {{ $errors->first('details') }}
                </p>
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('status', trans('Status').'', ['class' => 'control-label']) !!}
            {!! Form::select('status', array('1' => 'Open to School','2'=>'Open to Applicant','3'=>'Auditioning','0' => 'Closed'),  old('status'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('status'))
                <p class="help-block">
                    {{ $errors->first('status') }}
                </p>
            @endif
        </div>
    </div>


</div>
