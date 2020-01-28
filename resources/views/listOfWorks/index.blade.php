@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="whiteLine"></div>
            @foreach($listOfWorks as $listOfWork)
            <ul class="popularWork">
                <li onclick="location.href='/paper/{{ $listOfWork->id }}';"><a class="union fl"></a></li>
                <li onclick="location.href='/paper/{{ $listOfWork->id }}';" class="worksTitle fl"><a href="/paper/{{ $listOfWork->id }}">{{ $listOfWork->paper_name }}</a></li>
                <li onclick="location.href='/paper/{{ $listOfWork->id }}';" class="worksText fl">{{ $listOfWork->paper_note }}</li>
                <li class="likesAndDate fr">
                    <span class="like fl ajax"><a href="" class="ajax">
                        <?php
                            $votes_count = $votes->where('paper_id', $listOfWork->id)->count();;
                        ?>
                        </span>
                        <span class="likesNumber fl">{{ $votes_count }}</span>
                    </a>
                    <span class="date fr"><i>Дата:</i> {{ $listOfWork->updated_at->format('d.m.Y') }}</span>
                </li>
            </ul>

            <script>
                $(function(){
                    $('.ajax').click(function(){
                        //var product_id = $(this).val();
                        event.preventDefault();
                        var el = this;
                        $.ajax({
                            url: '{{ route('vote.create', $listOfWork->id) }}',
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
        <?php echo $listOfWorks->links(); ?>
        <div class="whiteLine"></div>
    </section>
@endsection