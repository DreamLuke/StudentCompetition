@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="">
            <ul class="personalTabs">
                <li class="profile active"><a href="{{ route('contestant') }}">профиль</a></li>
                <li class="notifications"><a href="{{ route('paper') }}">работы</a></li>
            </ul>
                    <form action="{{ route('contestant.update', $user->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="profileBoxInfo">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                            <label for="full_name" class="profileInfo fl">{{ __('ФИО:') }}</label>
                            <input type="text" name="full_name" value="{{ $user->full_name }}">
                        </div>
                        @if($errors->has('full_name'))
                            <div style="color:red; padding-left: 230px">{{ $errors->first('full_name') }}</div>
                        @endif

                        <div class="profileBoxInfo">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                            <label for="facility" class="profileInfo fl">{{ __('Организация:') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="facility" value="{{ $expert->facility }}">
                            </div>
                        </div>
                        @if($errors->has('facility'))
                            <div style="color:red; padding-left: 230px">{{ $errors->first('facility') }}</div>
                        @endif

                        <div class="editProfile fl">
                            <input type="submit" value="Сохранить изменения">
                        </div>

                    </form>
                    
                    <div class="editProfile fl">
                            <button onclick="location.href = '{{ route('contestant') }}';" id="myButton" class="float-left submit-button" >Отмена</button>
                    </div>
                </div>
    </section>
@endsection

