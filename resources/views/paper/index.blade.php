@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="">
            <ul class="personalTabs">
                <li class="profile"><a href="{{ route('redirect') }}">профиль</a></li>
                <li class="notifications"><a href="{{ route('notification') }}">оповещения</a></li>
                <li class="myWork active"><a href="{{ route('paper') }}">мои работы</a></li>
            </ul>
        </div>
        <div class="ProfileBox">
            <ul class="popularWork popularWorksAddBorder">
                    <li class="unionAdd fl"><a href=""></a></li>
                    <li class="addWork fl"><button class="btnAddWork">ОПУБЛИКОВАТЬ РАБОТУ</button></li>
            </ul>
            @foreach($papers as $paper)
            <ul class="popularWork">
                <li onclick="location.href='/paper/{{ $paper->id }}';" class="union fl"></li>
                <li onclick="location.href='/paper/{{ $paper->id }}';" class="worksTitle fl"><a href="/paper/{{ $paper->id }}">{{ $paper->paper_name }}</a></li>
                <li onclick="location.href='/paper/{{ $paper->id }}';" class="worksText fl">{{ $paper->paper_note }}</li>
                <li class="likesAndDate fr">
                    <span class="like fl ajax"><a href="" class="ajax">
                    <?php
                        $votes_count = $votes->where('paper_id', $paper->id)->count();
                    ?>
                    </span>
                    <span class="likesNumber fl">{{ $votes_count }}</span>
                    </a>
                    <span class="date fr"><i>Дата:</i> {{ $paper->updated_at->format('d.m.Y') }}</span>
                </li>
            </ul>

            <script>
                $(function(){
                    $('.ajax').click(function(){
                        //var product_id = $(this).val();
                        event.preventDefault();
                        var el = this;
                        $.ajax({
                            url: '{{ route('vote.create', $paper->id) }}',
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
            @endforeach
            <section class="w1100 white topMargin">
                <div class="contentPopularWorks">Требования к работам</div>
                <div class="requirements">
                    <p>
                        В соответствии с главной целью, научная работа студента (как и любая научная работа) оформляется
                        для представления специфическому читателю — ученому, специалисту в определенной области знания,
                        который должен ее понять и извлечь интересующую именно его информацию, а также оценить ее с точки
                        зрения научной новизны, обоснованности полученных результатов, перспективности использования и т.п.
                        Поэтому при оформлении работы необходимо это учитывать, максимально облегчая процесс понимания
                        на всех уровнях:
                    </p>
                    <p>
                        1 Использовать хороший литературный русский язык (рекомендуется тщательно считывать текст на
                        предмет исправления грамматических, орфографических, стилистических и других ошибок).
                    </p>
                    <p>
                        2 Текст должен быть легко читаемым, напечатан через 1,5-2 интервала шрифтом порядка 12 пунктов для
                        основного текста (близко к стандартному шрифту механической пишущей машинки). Общий объем работы,
                        как правило, не должен превышать 50-75 стр., соответственно (без учета приложения).
                    </p>
                    <p>
                        3 Следует использовать лаконичный объективно-беспристрастный стиль изложения (журналистский
                        пафос может быть иногда уместен только во введении и заключении). Необходимо следить за точностью
                        формулировок и корректностью употребляемых терминов и понятий (при необходимости давать определения
                        используемых понятий, пояснять, почему выбран тот или иной вариант употребления понятия),
                        не использовать в качестве терминов слова, заимствованные из иностранного языка, если существуют
                        полностью эквивалентные понятия в русском языке.
                    </p>
                    <p>
                        4 Специально структурировать работу и представлять результаты в удобной форме (рекомендуется
                        основные схемы, графики и таблицы, представляющие материал в конденсированном виде и необходимые
                        для лучшего понимания текста, размещать по ходу изложения, в то время как дополнительные материалы
                        в виде таблиц или графиков, размещать в конце текста в приложении, чтобы не загромождать текст и
                        не отвлекать читателя от основной мысли).
                    </p>
                    <p>
                        5 Строгий и единообразный способ ссылок на цитированные литературные источники (рекомендуется
                        использовать один из двух основных способов ссылок) — а) через указание в скобках фамилии автора
                        и года работы (в случае двух соавторов — указываются оба автора, в случае большего числа
                        соавторов — фамилия первого автора и обозначение «и др.»), б) через указания в скобках номера
                        источника в списке литературы. ФИО редко цитируемых зарубежных авторов желательно приводить
                        дважды — как в русской транскрипции, так и на языке оригинала.
                    </p>
                    <p>
                        6 Возможны два способа цитирования — а) прямое цитирование, в этом случае в кавычках дословно
                        повторяется текст из соответствующего источника (в ссылке на источник...
                    </p>
                    <a class="fullText fr" href="{{ route('requirement') }}">Полный текст требований</a>
                </div>
                <!-- end job requirments section -->




                <div class="popup_fast">
                    <div class="contentPopularWorks popupContentPopularWorks">Опубликовать работу</div>
                    <form class="ProfileBox" action="{{ route('paper.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="profileBoxInfo popupPaperNote">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                            <label for="paper_name" class="profileInfo fl popupProfileInfo">{{ __('Наименование работы:') }}</label>
                            <input type="text" name="paper_name" value="{{ old('paper_name') }}" required>
                        </div>

                        <div class="profileBoxInfo popupPaperNote2">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                            <label for="paper_note" class="profileInfo fl popupProfileInfo">{{ __('Краткое описание работы:') }}</label>
                            <textarea type="text" name="paper_note" required>{{ old('paper_note') }}</textarea>
                        </div>

                        <div class="profileBoxInfo">
                            <input type="file" class="file" name="avatar">
                        </div>
                        <ul>
                            <li class="editProfile">
                                <input type="submit" value="Отправить">
                            </li>
                        </ul>
                    </form>

                    <ul>
                        <li class="editProfile2 fr">
                            <button id="myButton" class="float-left submit-button2">Отменить</button>
                        </li>
                    </ul>

                </div>
                <div class="bg_popup"></div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                    $('.popularWorksAddBorder').click(function () {
                        $('.popup_fast').css({'top': $(window).scrollTop() +100}).addClass('noActive');
                        $('.bg_popup').fadeIn();

                        $('.bg_popup').click(function () {
                            $('.popup_fast').removeClass('noActive');
                            $('.bg_popup').fadeOut();
                        })
                        $('#myButton').click(function () {
                            $('.popup_fast').removeClass('noActive');
                            $('.bg_popup').fadeOut();
                        })
                    });
                    $(window).scroll(function () {
                        $('.popup_fast').css({'top': $(window).scrollTop() +100});
                    }).scroll();
                </script>

            </section>
        </div>
    </section>

@endsection