{{--<?php--}}
{{--use App\Role;--}}
{{--$role = new Role();--}}
{{--?>--}}
        {{--@if ($role->isAdmin()) --}}{{-- ADMIN ONLY --}}
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
                        <a class="nav-link" href="/rent">Аренда</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</head>
<body>
<div class="container">
    <h2>Список Экипажа
        {{--добавление нового экипажа--}}
        <div class="regisrtration">
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1" onclick="revealRegister()">
                Добавить
            </button>
        </div>
        <div class="modal" id="modal1" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal" action="/staff" method="post" >
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h2>Регистрация экипажа яхты</h2>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="fullname">Фамилия и Имя :</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Введите ФИО">
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-xs-3" for="passport">Номер паспорта:</label>
                            <div class="col-xs-9">
                            <input type="text" class="form-control" id="passport" name="passport" placeholder="Введите номер">
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="sex">пол:</label>
                                <select id="sex" name="sex" class="col-xs-9">
                                    <option value="М">М</option>
                                    <option value="F">F</option>
                                </select>
                        <div class="form-group">
                            <label class="control-label col-xs-3" for="databirth">Дата рождения:</label>
                            <div class="col-xs-9">
                                <input type = "date" class="form-control" id="databirth" name="databirth" placeholder="Введите дату">
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="position1">Должность:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="position1" name="position1" placeholder="Введите должность">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="salary">Зарплата:</label>
                                <div class="col-xs-9">
                                    <input type="number" class="form-control" name="salary" id="salary" placeholder="Введите зарплату">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="start_work">Начало работы:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" name="start_work" id="start_work" placeholder="Введите дату">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="finish_work">Конец работы:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" name="finish_work" id="finish_work" placeholder="Введите дату">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="yacht_id">Номер яхты:</label>
                                <div class="col-xs-9">
                                    <input type="number" class="form-control" name="yacht_id"id="yacht_id" placeholder="Введите номер">
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
                        </div>
                </form>

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
    @foreach($staff as $st)
    <button class="accordion">
        <div class="staff">
            <p>
                {{ $st->id }} . {{ $st->fullname }}
            </p>
        </div>
    </button>
    <div class="panel">

        <p>Пол: {{ $st->sex }}</p>
        <p>Номер паспорта: {{ $st->passport }}</p>
        <p>Дата рождения: {{ $st->databirth}}</p>
        <form action="/editStaff/{{$st->id}}" method="post">
            {{ csrf_field() }}
            <div>
                <input type="text" name="id" style="display: none" value="{{$st->id}}">
            </div>
            <div>
                <label for="">номер яхты</label>
                <input type="number" name="yacht_id" value="{{$st->yacht_id}}" required>
            </div>
            <div>
                <label for="">работа от</label>
                <input type="date" name="start_work" value="{{$st->start_work}}" required>
            </div>
            <div>
                <label for="">работа до</label>
                <input type="date" name="finish_work" value="{{$st->finish_work}}" required>
            </div>
            <div>
                <label for="">должность</label>
                <input type="text" name="position1" value="{{$st->position1}}" required>
            </div>
            <div>
                <label for="">зарплата</label>
                <input type="number" name="salary" value="{{$st->salary}}" required>
            </div>
            <button>редактировать сотрудника</button>
        </form>
        <a href="/editStaff/{{$st->id}}">
        <form action="/deleteStaff/{{$st->id}}" method="post">
            {{ csrf_field() }}
            {{--<input name="_method" type="hidden" value="DELETE">--}}
            {{--<input name="_token" type="hidden" value="1hox0VLpoJF8FdtFhShunbEsIhTFCz3qAAFUap81">--}}
            <button>удалить сотрудника</button>
        </form>
        <a href="/deleteStaff/{{$st->id}}">удалить сотрудника</a>

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
