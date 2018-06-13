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
    <h2>Договора об аренде яхт

        <div class="modal" id="modal1" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
            <script type="text/javascript">
                function revealRegister() {
                    var modal = document.getElementById('modal1');
                    modal.style.display = "block";
                }
            </script>
    </h2>
</div>
<div class="container">
    @foreach($rents as $rent)
        <button class="accordion">
            <div class="owner">
                <p>Договор номер: {{ $rent->rent_id }} </p>
            </div>
        </button>
        <div class="panel">
            <p> Дата аренды: от {{ $rent->rent_start }} до {{$rent->rent_finish}}</p>
            <p>Номер яхты: {{$rent->yacht_id}}</p>
            <form action="/deleteRent/{{$rent->id}}" method="post">
                {{ csrf_field() }}
                <button>удалить договор</button>
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
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
</html>


