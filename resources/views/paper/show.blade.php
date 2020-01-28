@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="ProfileBox">
                <ul class="singlePopularWork">
                    {{--<li class="singleFile fl"><a href=""></a></li>--}}
                    <li class="singleWorksTitle"><h3>{{ $papers->paper_name }}</h3></li>
                    <li class="singleWorksText">{{ $papers->paper_note }}</li>
                    <li class="singleLikesAndDate fr">
                        <span class="singleFile fl"></span>
                        <span class="saveSingleFile fl"><a href="/paper/{{ $papers->id }}/download">Скачать полный текст работы</a></span>
                        <span class="like fl ajax"><a href="" class="ajax">
                        <?php
                            $votes_count = $votes->where('paper_id', $papers->id)->count();
                        ?>
                        </span>
                        <span class="likesNumber fl">{{ $votes_count }}</span>
                        </a>
                        <span class="date fr">Дата: {{ $papers->updated_at->format('d.m.Y') }}</span>
                    </li>
                </ul>

        </div>
        @if($role->role_name == 'expert' && $status->status_name == 'not')
        <div>
            <form class="ProfileBox formEdit" action="{{ route('reviewing.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="profileBoxInfo">
                <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="comnt_content" class="profileInfo fl">{{ __('Содержание комментария:') }}</label>
                    <textarea name="comnt_content" id="comnt_content" cols="30" rows="10">{{ old('comnt_content') }}</textarea>
                </div>
                @if($errors->has('comnt_content'))
                    <div style="color:red; padding-left: 230px">{{ $errors->first('comnt_content') }}</div>
                @endif

                <div class="profileBoxInfo">
                <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="value" class="profileInfo fl">{{ __('Оценка:') }}</label>
                    <input type="number" name="value" id="value" min="0" max="100" value="{{ old('value') }}">
                </div>
                @if($errors->has('value'))
                    <div style="color:red; padding-left: 230px">{{ $errors->first('value') }}</div>
                @endif

                <input type="hidden" name="id" id="id" value="{{ $papers->id }}">

                <div class="editProfile fl">
                    <input type="submit" value="Отправить">
                </div>

            </form>
            <div class="editProfile myButton3 fl">
                <button onclick="location.href = '/profile_expert/works';" id="myButton" class="float-left submit-button" >Вернуться к списку работ</button>
            </div>
        </div>
        @endif
    </section>
    <div class="whiteLine"></div>

    <script>
        $(function(){
            $('.ajax').click(function(){
                //var product_id = $(this).val();
                event.preventDefault();
                var el = this;
                $.ajax({
                    url: '{{ route('vote.create', $papers->id) }}',
                    type: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: ({ }),
                    dataType: 'json',

                    success: function(answers){
                        $('span', el).text(answers)
                    
                        //$('.ajax_answer').append("span class='likesNumber fl>'"+answers+"</span>");
                        //$('.ajax_answer').append(answers);
                        //$votes_count = answers;

                    },
                    error: function(){

                    }
                })
            })
        })
    </script>
@endsection