@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="">
            <ul class="personalTabs">
                <li class="profile active"><a href="{{ route('expert') }}">профиль</a></li>
                <li class="notifications"><a href="{{ route('expert.works') }}">работы</a></li>
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
                        <label for="facility" class="profileInfo fl">{{ __('Организация:') }}</label>
                        <div class="fl">
                            {{ $expert->facility }}
                        </div>
                    </div>

                    <div class="profileBoxInfo">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                        <label for="practice" class="profileInfo fl">{{ __('Деятельность:') }}</label>
                        <div class="fl">
                            {{ $expert->practice }}
                        </div>
                    </div>


                    <div class="editProfile">
                        <a href="/profile_expert/{{ $user->id }}/edit">{{ __('Изменить данные профиля') }}</a>
                        <!-- <button type="submit" class="btn btn-primary">
                            {{ __('Изменить данные профиля') }}
                        </button> -->
                    </div>

        </div>
    </section>
@endsection