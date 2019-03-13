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
            {!! Form::label('duration', trans('Course Duration').'', ['class' => 'control-label']) !!}
            {!! Form::text('duration', old('duration'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('duration'))
                <p class="help-block">
                    {{ $errors->first('duration') }}
                </p>
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('qualification_id', trans('Qualification/Certificate').'', ['class' => 'control-label']) !!}
            {!! Form::select('qualification_id', $qualifications,  old('qualification_id'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('qualification_id'))
                <p class="help-block">
                    {{ $errors->first('qualification_id') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('category_id', trans('Faculty').'', ['class' => 'control-label']) !!}
            {!! Form::select('category_id', $categories,  old('category_id'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('catogory_id'))
                <p class="help-block">
                    {{ $errors->first('catogory_id') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('description', trans('Description').'', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}
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
            {!! Form::label('fees', trans('Fees').'', ['class' => 'control-label']) !!}
            {!! Form::text('fees', old('town_city'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('company_id', trans('School').'', ['class' => 'control-label']) !!}
            {!! Form::select('company_id', $company, ['id' => $company_id], ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('company_id'))
                <p class="help-block">
                    {{ $errors->first('company_id') }}
                </p>
            @endif
        </div>
    </div>
</div>
