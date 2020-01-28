@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="">
            <ul class="personalTabs">
                <li class="profile active"><a href="{{ route('contestant') }}">профиль</a></li>
                <li class="notifications"><a href="{{ route('notification') }}">оповещения</a></li>
                <li class="myWork"><a href="{{ route('paper') }}">мои работы</a></li>
            </ul>
        </div>
        <div class="ProfileBox">
            @csrf
                    <div class="profileBoxInfo">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                        <label for="full_name" class="profileInfo fl">{{ __('ФИО:') }}</label>
                        <div class="fl">
                            {{ $user->full_name }}
                        </div>
                    </div>

                    <div class="profileBoxInfo">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                        <label for="university_name" class="profileInfo fl">{{ __('ВУЗ:') }}</label>
                        <div class="fl">
                            {{ $university->university_name }}
                        </div>
                    </div>

                    <div class="profileBoxInfo">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                        <label for="faculty_name" class="profileInfo fl">{{ __('Факультет:') }}</label>
                        <div class="fl">
                            {{ $contestant->faculty_name }}
                        </div>
                    </div>

                    <div class="profileBoxInfo">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                        <label for="specialty_name" class="profileInfo fl">{{ __('Специальность:') }}</label>
                        <div class="fl">
                            {{ $contestant->specialty_name }}
                        </div>
                    </div>

                    <div class="profileBoxInfo">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                        <label for="year" class="profileInfo fl">{{ __('Курс:') }}</label>
                        <div class="fl">
                            {{ $contestant->year }}
                        </div>
                    </div>

                    <div class="profileBoxInfo">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                        <label for="papersCount" class="profileInfo fl">{{ __('Публикаций:') }}</label>
                        <div class="fl">
                            {{ $papersCount }}
                        </div>
                    </div>

                    <div class="editProfile">
                        <a href="/profile_contestant/{{ $user->id }}/edit">{{ __('Изменить данные профиля') }}</a>
                        <!-- <button type="submit" class="btn btn-primary">
                            {{ __('Изменить данные профиля') }}
                        </button> -->
                    </div>
        </div>
    </section>
    <div class="whiteLine"></div>
@endsection