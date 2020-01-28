@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="ProfileBox">
                <ul class="popularWork">
                    <li class="union fl"></li>
                    <li class="worksTitle fl"><a href="#">{{ $listOfWorks->paper_name }}</a></li>
                    <li class="worksText fl">{{ $listOfWorks->paper_note }}</li>
                    <li class="likesAndDate fr">
                        <span class="like fl"></span>
                        <span class="likesNumber fl">0</span>
                        <span class="date fr">Дата: {{ $listOfWorks->updated_at }}</span>
                    </li>
                </ul>
        </div>
    </section>
@endsection