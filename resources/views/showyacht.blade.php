@extends('master')

@section('content')

    <link rel="stylesheet" href="/css/yacht.css">
    {{--каталог яхт и окошко фильтров--}}
    <div class="my-flex-block">
        <div class="my-flex-container2">
            <div class="yachts">

                {{--@foreach($yachts as $yacht)--}}
                    <div class="yacht">
                        <img src="/images/logo.png" alt="">
                        <p>{{ $yacht->id }}</p>
                        <p>{{ $yacht->model }}
                            {{ $yacht->mark }}
                        </p>
                        <p>Флаг: {{ $yacht->flag }}</p>
                        <p>Порт приписки: {{ $yacht->portofregistry }} </p>
                        <p>Водоизмещение: {{ $yacht->displacement }}</p>
                        <p>Тип: {{ $yacht->type }}</p>
                        <p>Цена за сутки: {{ $yacht->price }}</p>
                        <p> @if ($yacht->status == 1)
                                <span>Доступно</span>
                            @else
                                <span>Недоступно</span>
                            @endif
                        </p>
                        <a href=""></a>
                    </div>
                {{--@endforeach--}}
            </div>
        </div>
    </div>

@endsection