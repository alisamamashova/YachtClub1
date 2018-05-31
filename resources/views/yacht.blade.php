@extends('master')

@section('content')

<link rel="stylesheet" href="/css/yacht.css">
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
           <div class="yachts">

               @foreach($yachts as $yacht)
                   <div class="yacht">
                       <img src="/images/logo.png" alt="">
                       <p>{{ $yacht->id }}</p>
                       <a href="/yachts/{{ $yacht->id }}">
                           {{ $yacht->model }}
                           {{ $yacht->mark }}
                       </a>
                       <p>{{ $yacht->type }}</p>
                       <p>{{ $yacht->price }}</p>
                       <p>
                           @if ($yacht->status == 1)
                           <span>Доступно</span>
                               @else
                               <span>Недоступно</span>
                               @endif
                       </p>
                   </div>

               @endforeach
           </div>
       </div>
    </div>

@endsection