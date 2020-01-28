@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="ProfileBox">
                <ul class="singlePopularWork">
                    {{--<li class="singleFile fl"><a href=""></a></li>--}}
                    <li class="singleWorksTitle"><b>{{ $paper->paper_name }}</b></li>
                    <li class="singleWorksText">{{ $paper->paper_note }}</li>
                    <li class="singleLikesAndDate fr">
                        <span class="singleFile fl"></span>
                        <span class="saveSingleFile fl"><a href="/paper/{{ $paper->id }}/download">Скачать полный текст работы</a></span>
                        <span class="like fl"></span>
                        <span class="likesNumber fl">0</span>
                        <span class="date fr">Дата: {{ $paper->updated_at }}</span>
                    </li>
                </ul>
        </div>
        <div>
            <form class="ProfileBox" action="{{ route('reviewing.update', $paper->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                <div class="profileBoxInfo">
                <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="comnt_content" class="profileInfo fl">{{ __('Содержание комментария:') }}</label>
                    <textarea name="comnt_content" id="comnt_content" cols="30" rows="10">{{ old('comnt_content') }}</textarea>
                </div>

                <div class="profileBoxInfo">
                <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="value" class="profileInfo fl">{{ __('Оценка:') }}</label>
                    <input type="number" name="value" id="value" min="0" max="100" value="{{ old('value') }}">
                </div>

                <input type="hidden" name="id" id="id" value="{{ $paper->id }}">

                <div class="editProfile fl">
                    <input type="submit" value="Отправить">
                </div>

            </form>

            <div class="editProfile fl">
                <button onclick="location.href = '{{ route('reviewing') }}';" id="myButton" class="float-left submit-button" >Отмена1</button>
            </div>
        </div>
      
    </section>
@endsection