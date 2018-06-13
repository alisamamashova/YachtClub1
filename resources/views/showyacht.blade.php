@extends('master')

@section('content')

    <link rel="stylesheet" href="/css/app.css">
    {{--каталог яхт и окошко фильтров--}}
    <div id="popup" style="display: none; position: fixed; height: 90%; left: 0; right: 0; width: 80%;border-radius: 8px; margin: 0 auto;
top:50px; background: white; -webkit-box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.75);">
        <div onclick="document.getElementById('popup').style.display = 'none';">Close</div>
        <style>
            label {
                color: #000;
            }
            input { color: black;}
            form {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100%;
            }
            div {
                height: 50px;
            }
        </style>
        <form action="/rents" method="post">
            {{ csrf_field() }}
            <input name="yacht_id" value="{{$yacht->id}}"  style="display: none;" type="text">
            <div>
                <label for="">Имя</label>
                <input name="fullname" type="text" required>
            </div>
            <div>
                <label for="">Паспорт</label>
                <input name="passport" type="text" required>
            </div>
            <div>
                <label for="">Телефон</label>
                <input name="phone_number" type="text">
            </div>
            <div>
                <label for="">Дата начала</label>
                <input name="rent_start" type="date">
            </div>
            <div>
                <label for="">Дата завершения</label>
                <input name="rent_finish" type="date">
            </div>
            <div>
                <label for="">Способ оплаты</label>
                <select name="paymentmethod" id="">
                    <option value="Cash">Cash</option>
                    <option value="Card">Card</option>
                </select>
                {{--<input type="text">--}}
            </div>
            <button>Забронировать</button>
        </form>
    </div>
    <div class="my-flex-block">
        <div class="my-flex-container2">
            <div class="yachts">

                {{--@foreach($yachts as $yacht)--}}
                    <div class="yacht">
                        <img src="{{$yacht->images}}" alt="" style="margin-top: 25px; max-width: 500px">
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
                        <button onclick="document.getElementById('popup').style.display = 'block'">Забронировать</button>
                        {{--<a href=""></a>--}}
                    </div>

                {{--@endforeach--}}
            </div>
        </div>
    </div>


@endsection