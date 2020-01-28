@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="">
            <ul class="personalTabs">
                <li class="profile"><a href="{{ route('expert') }}">профиль</a></li>
                <li class="notifications active"><a href="{{ route('expert.works') }}">работы</a></li>
            </ul>
        </div>
        <div class="ProfileBox">
            @csrf
            @foreach($listOfWorks as $listOfWork)
                {{--@foreach($scores as $score)--}}
                <ul class="popularWork">
                    <li onclick="location.href='/paper/{{ $listOfWork->id }}';" class="union fl"></li>
                    <li onclick="location.href='/paper/{{ $listOfWork->id }}';" class="worksTitle fl"><a href="/paper/{{ $listOfWork->id }}">{{ $listOfWork->paper_name }}</a></li>
                    <li onclick="location.href='/paper/{{ $listOfWork->id }}';" class="worksText fl">{{ $listOfWork->paper_note }}</li>
                    <li class="likesAndDate fr">
                        <span class="like fl"><a href="{{ route('vote.create', $listOfWork->id) }}"></span>
                        <?php
                            $votes_count = $votes->where('paper_id', $listOfWork->id)->count();
                        ?>
                        <span class="likesNumber fl">{{ $votes_count }}</span>
                        <span class="date fr"><i>Дата:</i> {{ $listOfWork->updated_at->format('d.m.Y') }}</span>
                    </li>
                </ul>
                {{--@endforeach--}}
            @endforeach
        </div>
        <?php echo $listOfWorks->links(); ?>
    </section>
@endsection