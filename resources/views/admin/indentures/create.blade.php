@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.indenture.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.indentures.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.indenture.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indenture.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.indenture.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}">
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indenture.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_dk">{{ trans('cruds.indenture.fields.start_dk') }}</label>
                <input class="form-control {{ $errors->has('start_dk') ? 'is-invalid' : '' }}" type="text" name="start_dk" id="start_dk" value="{{ old('start_dk', '') }}">
                @if($errors->has('start_dk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_dk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indenture.fields.start_dk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="destination_dk">{{ trans('cruds.indenture.fields.destination_dk') }}</label>
                <input class="form-control {{ $errors->has('destination_dk') ? 'is-invalid' : '' }}" type="text" name="destination_dk" id="destination_dk" value="{{ old('destination_dk', '') }}">
                @if($errors->has('destination_dk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destination_dk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.indenture.fields.destination_dk_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection