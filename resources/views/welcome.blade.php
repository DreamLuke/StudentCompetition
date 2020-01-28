@extends('layouts.app')

@section('content')
        <!-- banner section -->
        <section class="w1100">
            <div class="whiteLine"></div>
            <div class="content">
                @csrf
                @guest
                <div class="fonContaiber">
                    <div class="bannerMainInfo">ЗАКАНЧИВАЕТСЯ ПРИЁМ ЗАЯВОК НА УЧАСТИЕ В КОНКУРСЕ СТУДЕНТЧЕСКИХ РАБОТ</div>
                    <div class="bannerInfo">
                        <div class="bannerNews">1 марта 2019 года заканчивается прием заявок и конкурсных
                            материалов на областной конкурс «Коллективный договор - основа защиты социально-трудовых
                            прав работников», которые принимаются в Министерстве экономического развития Челябинской
                            области по адресу: пр. Ленина 57, каб. 421.</div>
                        <div class="bannerBtn"><a href="{{ route('register') }}">Подать заявку</a></div>
                    </div>
                </div>
                @else
                    <div class="fonContaiber">
                        <div class="bannerMainInfo">ЗАКАНЧИВАЕТСЯ ПРИЁМ ЗАЯВОК НА УЧАСТИЕ В КОНКУРСЕ СТУДЕНТЧЕСКИХ РАБОТ</div>
                        <div class="bannerInfo">
                            <div class="bannerNews bannerNewsNoGuest">1 марта 2019 года заканчивается прием заявок и конкурсных
                                материалов на областной конкурс «Коллективный договор - основа защиты социально-трудовых
                                прав работников», которые принимаются в Министерстве экономического развития Челябинской
                                области по адресу: пр. Ленина 57, каб. 421.</div>
                        </div>
                    </div>
                @endguest
            </div>
            <div class="whiteLine"></div>
        </section>
        <!-- end banner section -->
        <!-- Popular works section -->
        @if (!empty($papers))
        <section class="w1100 white">
            <div class="contentPopularWorks">Популярные работы</div>
            @foreach($papers as $paper)
                <ul class="popularWork mainPopularWork">
                    <li onclick="location.href='/paper/{{ $paper->id }}';" class="union fl"></li>
                    <li onclick="location.href='/paper/{{ $paper->id }}';" class="popularWorksTitle fl"><a href="#">{{ $paper->paper_name }}</a></li>
                    <li onclick="location.href='/paper/{{ $paper->id }}';" class="worksText mainWorksText fl">{{ $paper->paper_note }}</li>
                    <li class="likesAndDate fr">
                        <span class="like fl ajax"><a href="" class="ajax">
                        <?php
//                            $votes_count = $votes->where('paper_id', $paper->id)->count();
                       ?>
                        </span>
                        <span class="likesNumber fl ajax_answer">{{ $paper->voteCount }}</span>
                        </a>
                        <span class="date fr"><i>Дата:</i> {{ $paper->updated_at }}</span>
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
		                        data: ({ id_paper : 0 }),
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

        </section>
        <!-- end Popular works section -->
        <!-- diagram section -->
        <section class="w1100 white">
            <div class="contentPopularWorks">Активность конкурса</div>
            <div class="diagram"></div>
        </section>
        <!-- end diagram section -->
        @endif
        <!-- job requirements section -->
        <section class="w1100 white">
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
        </section>

@endsection

