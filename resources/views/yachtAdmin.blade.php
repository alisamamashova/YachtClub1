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

    <div class="container">
        <div class="jumbotron">
            <h1>Яхт Клуб</h1>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
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
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<body>
<div class="container">
    <h2>Список яхт
        {{--добавление нового экипажа--}}
        <div class="regisrtration">
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1" onclick="revealRegister()">
                Добавить
            </button>
        </div>
        <div class="modal" id="modal1" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal" action="/yachtsAdmin" method="post" >
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h2>Добавление новой яхты</h2>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="mark">Марка :</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="mark" name="mark" placeholder="Введите марку">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="model">Mодель:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="model" name="model" placeholder="Введите модель">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="price">Цена:</label>
                                <div class="col-xs-9">
                                    <input type="integer" class="form-control" id="price" name="price" placeholder="Введите цену">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="flag">Флаг:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="flag" name="flag">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="portofregistry">Порт пририски:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="portofregistry" name="portofregistry">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="displacement">Водоизмещение:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="displacement" name="displacement">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="type">Type:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="type" name="type">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="status">Статус:</label>
                                <div class="col-xs-9">
                                    <input type="boolean" class="form-control" id="status" name="status">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="owner_id">Владелец:</label>
                                <div class="col-xs-9">
                                    <input type="boolean" class="form-control" id="owner_id" name="owner_id">
                                </div>
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
            </div>
        </div>

        <script type="text/javascript">
            function revealRegister() {
                var modal = document.getElementById('modal1');
                modal.style.display = "block";
            }
        </script>
    </h2>
    @foreach($yachts as $yacht)
        <button class="accordion">
            <div class="staff">
                <p>
                    {{ $yacht->id }} . {{ $yacht->mark }} {{$yacht->model}}
                </p>
            </div>
        </button>
        <div class="panel">

            <p>Флаг: {{ $yacht->flag}}</p>
            <p>Порт приписки: {{ $yacht->portofregistry}}</p>
            <p>Цена: {{ $yacht->price}}</p>
            <form action="/editYacht/{{$yacht->id}}" method="post">
                {{ csrf_field() }}
                {{--<button>редактировать сотрудника</button>--}}
            </form>
            {{--<a href="/editStaff/{{$st->id}}">--}}
            <form action="/deleteYacht/{{$yacht->id}}" method="post">
                {{ csrf_field() }}
                {{--<input name="_method" type="hidden" value="DELETE">--}}
                {{--<input name="_token" type="hidden" value="1hox0VLpoJF8FdtFhShunbEsIhTFCz3qAAFUap81">--}}
                <button>удалить яхту</button>
            </form>
            {{--<a href="/deleteStaff/{{$st->id}}">удалить сотрудника</a>--}}

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
{{--@endif--}}
