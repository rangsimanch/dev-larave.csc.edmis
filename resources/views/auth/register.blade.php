@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card mx-4">
            <div class="card-body p-4">

                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <h1>{{ trans('panel.site_title') }}</h1>
                    <p class="text-muted">{{ trans('global.register') }}</p>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user fa-fw"></i>
                            </span>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_fullname') }}" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-birthday-cake fa-fw"></i>
                            </span>
                        </div>
                        <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}" required placeholder="{{ trans('global.dob') }}">
                            @if($errors->has('dob'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dob') }}
                            </div>
                            @endif
                        <span class="help-block">{{ trans('cruds.user.fields.dob_helper') }}</span>
                    </div>

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-venus-mars fa-fw"></i>
                            </span>
                        </div>
                    <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelectGender') }}</option>
                    @foreach(App\User::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                    </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
            </div>

            <div class="input-group mb-3">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-phone fa-fw"></i>
                            </span>
                        </div>
                <input class="form-control {{ $errors->has('workphone') ? 'is-invalid' : '' }}" type="text" name="workphone" id="workphone" value="{{ old('workphone', '') }}" placeholder="{{ trans('global.workphone') }}">
                @if($errors->has('workphone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('workphone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.workphone_helper') }}</span>
            </div>

            <div class="input-group mb-3">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-users fa-fw"></i>
                            </span>
                        </div>
                <select class="form-control {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required>
                <option value disabled {{ old('team', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelectTeam') }}</option>
                    @foreach($teams as $id => $team)
                        <option value="{{ $team -> id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>{{ $team -> name }}</option>
                    @endforeach
                </select>
                @if($errors->has('team_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.team_helper') }}</span>
            </div>

            <div class="input-group mb-3">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-users fa-fw"></i>
                            </span>
                        </div>
                <select class="form-control {{ $errors->has('jobtitle') ? 'is-invalid' : '' }}" name="jobtitle_id" id="jobtitle_id">
                <option value disabled {{ old('jobtitle', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelectPosition') }}</option>
                    @foreach($jobtitles as $id => $jobtitle)
                        <option value="{{ $jobtitle->id }}" {{ old('jobtitle_id') == $jobtitle->id ? 'selected' : '' }}>{{ $jobtitle -> name}}</option>
                    @endforeach
                </select>
                @if($errors->has('jobtitle_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jobtitle_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.jobtitle_helper') }}</span>
            </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope fa-fw"></i>
                            </span>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>

                    <button class="btn btn-block btn-primary">
                        {{ trans('global.register') }}
                    </button>

                </form>
                <br>
                <div class="input-group justify-content-center">
                        <a href="{{ route('login') }}">
                            Log in to using EDMIS for your account existing
                        </a>
                    </div>

            </div>
        </div>

    </div>
</div>

@endsection