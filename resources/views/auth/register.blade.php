@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app(default).css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Электронная почта') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('ФИО') }}</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}"  name="full_name" value="{{ old('full_name') }}" required>

                                 @if ($errors->has('full_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Подтверждение пароля') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="university_name" class="col-md-4 col-form-label text-md-right">{{ __('ВУЗ') }}</label>

                            <div class="col-md-6">
                                <input id="university_name" type="text" class="form-control{{ $errors->has('university_name') ? ' is-invalid' : '' }}"  name="university_name" value="{{ old('university_name') }}" required>

                                 @if ($errors->has('university_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('university_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="faculty_name" class="col-md-4 col-form-label text-md-right">{{ __('Факультет') }}</label>

                            <div class="col-md-6">
                                <input id="faculty_name" type="text" class="form-control{{ $errors->has('faculty_name') ? ' is-invalid' : '' }}"  name="faculty_name" value="{{ old('faculty_name') }}" required>

                                 @if ($errors->has('faculty_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('faculty_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="specialty_name" class="col-md-4 col-form-label text-md-right">{{ __('Специальность') }}</label>

                            <div class="col-md-6">
                                <input id="specialty_name" type="text" class="form-control{{ $errors->has('specialty_name') ? ' is-invalid' : '' }}"  name="specialty_name" value="{{ old('specialty_name') }}" required>

                                 @if ($errors->has('specialty_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('specialty_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Курс') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}"  name="year" value="{{ old('year') }}" required>

                                 @if ($errors->has('year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Регистрация') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
