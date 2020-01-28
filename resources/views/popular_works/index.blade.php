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
                    <span class="like fl"><a href="{{ route('vote.create', $listOfWork->id) }}">
                        <?php
                            $votes_count = $votes->where('paper_id', $listOfWork->id)->count();;
                        ?>
                        </span>
                        <span class="likesNumber fl">{{ $votes_count }}</span>
                    </a>
                    <span class="date fr"><i>Дата:</i> {{ $listOfWork->updated_at }}</span>
                </li>
            </ul>
            @endforeach

    </section>
@endsection