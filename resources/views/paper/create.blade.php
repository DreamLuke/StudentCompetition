@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="">
            <ul class="personalTabs">
                <li class="profile"><a href="{{ route('contestant') }}">профиль</a></li>
                <li class="notifications"><a href="">оповещения</a></li>
                <li class="myWork active"><a href="{{ route('paper') }}">мои работы</a></li>
            </ul>
                    <form class="ProfileBox" action="{{ route('paper.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="profileBoxInfo">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                            <label for="paper_name" class="profileInfo fl">{{ __('Наименование работы:') }}</label>
                            <input type="text" name="paper_name" value="{{ old('paper_name') }}">
                        </div>

                        <div class="profileBoxInfo">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                            <label for="paper_note" class="profileInfo fl">{{ __('Краткое описание работы:') }}</label>
                            <input type="text" name="paper_note" value="{{ old('paper_note') }}">
                        </div>

                        <div class="profileBoxInfo">
                            <input type="file" name="avatar">
                        </div>

                        <div class="editProfile fl">
                            <input type="submit" value="Отправить">
                        </div>

                    </form>
                    
                    <div class="editProfile fl">
                            <button onclick="location.href = '{{ route('paper') }}';" id="myButton" class="float-left submit-button" >Отмена</button>
                    </div>
                </div>
    </section>
@endsection

