@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="whiteLine"></div>
        <section class="w1100 white">
            <div class="contentPopularWorks">Консультационная поддержка</div>
        </section>
        <form class="supportBox" action="" method="post">
            @csrf
            {{--<input type="hidden" name="_method" value="PUT">--}}

            <div class="profileBoxInfo supportField">
                <label for="email" class="profileInfo fl">{{ __('Email адрес:') }}</label>
                <input type="text" name="email" value="">

            </div>

            <div class="profileBoxInfo supportField">
                <label for="title" class="profileInfo fl">{{ __('Тема обращения:') }}</label>
                <div class="col-md-6">
                    <input type="text" name="title" value="">
                </div>
            </div>

            <div class="profileBoxInfo supportField">
                <label for="dialog_content" class="profileInfo fl">{{ __('Текст обращения:') }}</label>
                <div class="fl">
                    <textarea name="dialog_content" id="dialog_content" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="editProfile fl supportField textEdit">
                <input type="submit" value="Сохранить изменения">
            </div>
        </form>
    </section>
@endsection

