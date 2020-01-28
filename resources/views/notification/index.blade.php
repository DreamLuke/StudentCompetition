@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="">
            <ul class="personalTabs">
                <li class="profile"><a href="{{ route('redirect') }}">профиль</a></li>
                <li class="notifications active"><a href="">оповещения</a></li>
                <li class="myWork"><a href="{{ route('paper') }}">мои работы</a></li>
            </ul>
        </div>
        <div class="ProfileBox">
            <section class="w1100 white">

					@for($i = 0; $i < count($keys); $i++)
						<div class="dateNotifications">ДАТА:<span class="colorDate">{{ $keys[$i] }}</span></div>

						@for($j = 0; $j < count($notifications_data[$keys[$i]]); $j++)
							<div class="eventNotificationsBlock">
							    <div class="eventNotifications">
								    <a href="/paper/{{ $notifications_data[$keys[$i]][$j][1] }}">{{ $notifications_data[$keys[$i]][$j][0] }}</a>
								</div>
                                <div class="eventDate fr">{{ $notifications_data[$keys[$i]][$j][2] }}</div>
                            </div>
                        @endfor
                    @endfor

                {{--@for($i = 0; $i < count($notifications_data); $i++)--}}
                {{--<div class="dateNotifications"><span class="colorDate">Дата:</span>{{ ($notification->created_at->format('Y.m.d'))}}</div>--}}
                    {{--@foreach($notifications as $notification)--}}
                        {{--<div class="eventNotificationsBlock">--}}
                            {{--<div class="eventNotifications fl">--}}
                                {{--<a href="/paper/{{ $notification->paper_id }}">{{ $notification->notfn_content }}</a>--}}
                            {{--</div>--}}
                            {{--<div class="eventDate fr">--}}
                                {{--{{ $notification->created_at->format('H:i:m') }}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--@endfor--}}

                {{--@foreach($notifications as $notification)--}}
                    {{--<div class="dateNotifications"><span class="colorDate">Дата:</span>{{ ($notification->created_at->format('Y.m.d'))}}</div>--}}
                        {{--<div class="eventNotificationsBlock">--}}
                            {{--<div class="eventNotifications fl">--}}
                                {{--<a href="/paper/{{ $notification->paper_id }}">{{ $notification->notfn_content }}</a>--}}
                            {{--</div>--}}
                            {{--<div class="eventDate fr">--}}
                                {{--{{ $notification->created_at->format('H:i:m') }}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                {{--@endforeach--}}


            </section>
        </div>
    </section>
@endsection

<?php
//$arr = [];
//$keys = array_keys($notifications_data);
//// $arr[] = array_pop($notifications_data);
//
//for($i = 0; $i < count($keys); $i++) {
//    echo $keys[$i] . '<br>';
//    for($j = 0; $j < count($notifications_data[$keys[$i]]); $j++) {
//        echo $notifications_data[$keys[$i]][$j] . '<br>';
//    }
//}
//?>

{{--@foreach($notifications as $notification)--}}
    {{--<div class="dateNotifications"><span class="colorDate">Дата:</span>{{ ($notification->created_at->format('Y.m.d'))}}</div>--}}
    {{--<div class="eventNotificationsBlock">--}}
        {{--<div class="eventNotifications fl">--}}
            {{--<a href="/paper/{{ $notification->paper_id }}">{{ $notification->notfn_content }}</a>--}}
        {{--</div>--}}
        {{--<div class="eventDate fr">--}}
            {{--{{ $notification->created_at->format('H:i:m') }}--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endforeach--}}
