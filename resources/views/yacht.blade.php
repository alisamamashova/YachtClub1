@extends('master')

@section('content')

<link rel="stylesheet" href="/css/yacht.css">
<link rel="stylesheet" href="/css/master.css">
    {{--каталог яхт и окошко фильтров--}}
    <div class="my-flex-block">
       <div class="my-flex-container2">
           <div class="filters">
               <ul>
                   <li>a</li>
                   <li>b</li>
                   <li>
                       @foreach($types as $type)
                   <div class="types"></div>
                           <a href="/?type={{ $type->type}}">{{ $type->type}}</a>
                       @endforeach
                   </li>
                   <li>d</li>
               </ul>
           </div>

           <div class="container">
               @foreach($yachts as $yacht)
               <img src="/images/yachtbackground.png" alt="Avatar" class="image">
               <h2><p>{{ $yacht->id }}</p>
                   <a href="/yachts/{{ $yacht->id }}">
                   {{ $yacht->model }}
                   {{ $yacht->mark }}
                   </a>
               </h2>
       <p>{{ $yacht->type }} <br>
           {{ $yacht->price }}
       </p>
                   @if ($yacht->status == 1)
                   <span>Доступно</span>
                   @else
                   <span>Недоступно</span>
                   @endif
       <div class="overlay">
           <div class="text">123</div>
       </div>
               @endforeach
   </div>
   {{--<div class="container">--}}
               {{--@foreach($yachts as $yacht)--}}
               {{--<div class="yacht" style="width:400px">--}}
                   {{--<img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">--}}
                   {{--<div class="card-body">--}}
                       {{--<h4 class="card-title">--}}
                           {{--<p>{{ $yacht->id }}</p>--}}
                           {{--<a href="/yachts/{{ $yacht->id }}">--}}
                               {{--{{ $yacht->model }}--}}
                               {{--{{ $yacht->mark }}--}}
                           {{--</a>--}}
                       {{--</h4>--}}
                       {{--<p class="card-text">--}}
                           {{--{{ $yacht->type }} <br>--}}
                           {{--{{ $yacht->price }}--}}
                       {{--</p>--}}
                       {{--@if ($yacht->status == 1)--}}
                           {{--<span>Доступно</span>--}}
                       {{--@else--}}
                           {{--<span>Недоступно</span>--}}
                       {{--@endif--}}
                       {{--<a href="/yacht/{id}" class="btn btn-primary">Подробнее</a>--}}
                   {{--</div>--}}
               {{--</div>--}}
               {{--</div>--}}
           {{--@endforeach--}}
           </div>
           </div>
       </div>

    </div>
@endsection