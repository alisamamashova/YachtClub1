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
                        <a class="nav-link" href="/rent">Аренда</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</head>
    <body>
    <div class="container">
<h2>Владельцы яхт
    {{--добавление нового владельца--}}
    <div class="regisrtration">
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1" onclick="revealRegister()">
            Добавить владельца
        </button>
    </div>
    <div class="modal" id="modal1" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{route('storeOwner')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h2>Регистрация владельца яхты</h2>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" for="fullname">Фамилия и Имя :</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Введите ФИО">
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                        {{--<label class="control-label col-xs-3" for="firstName">Имя:</label>--}}
                        {{--<div class="col-xs-9">--}}
                        {{--<input type="text" class="form-control" id="firstName" placeholder="Введите имя">--}}
                        {{--</div>--}}
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="phone_number">Телефон:</label>
                        <div class="col-xs-9">
                            <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-9">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </div>
                    </div>
                </form>
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
@foreach($owners as $owner)
<button class="accordion">
        <div class="owner">
            <p> {{ $owner->id }} .
                {{ $owner->fullname }}
            </p>
        </div>
</button>
<div class="panel">
    <p> Телефон: {{ $owner->phone_number }}</p>
    <form action="/deleteOwner/{{$owner->id}}" method="post">
        {{ csrf_field() }}
        <button>удалить владельца</button>
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


