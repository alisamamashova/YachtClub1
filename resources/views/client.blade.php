<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/masterAdmin.css">
    <title> Яхт Клуб </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/masterAdmin.css">
    <link rel="stylesheet" href="/css/app.css">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="container">
        <div class="jumbotron">
            <h1>Яхт Клуб</h1>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Яхты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owner">Владельцы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/staff">Экипаж</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/client">Клиенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/rents">Аренда</a>
                    </li>
                    <li>
                        <p style="color: white;">{{Auth::user()->email}}</p>
                    </li>
                    <li class="nav-item">
                        <a href="/logout"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</head>
<body>
<div class="container">
    <h2>Клиенты клуба</h2>
</div>
<div class="container">
    @foreach($clients as $client)
        <button class="accordion">
            <div class="client">
                <p> {{ $client->id }} .
                    {{ $client->fullname }}
                </p>
            </div>
        </button>
        <div class="panel">
            <p>Номер паспорта: {{ $client->passport }}</p>
            <p>Телефон: {{ $client->phone_number }}</p>
            {{--<p>Количество контрактов: {{$client->Rent_amount}}</p>--}}
            <form action="/deleteClient/{{$client->id}}" method="post">
                {{ csrf_field() }}
                <button>удалить клиента</button>
            </form>
        </div>
    @endforeach
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight){
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>
</div>
</body>
</html>


