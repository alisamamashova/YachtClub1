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
                    <form class="form-horizontal">
                        <div class="modal-header">
                            <h2>Регистрация экипажа яхты</h2>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Фамилия и Имя :</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="lastName" placeholder="Введите ФИО">
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-xs-3" for="firstName">Номер паспорта:</label>
                            <div class="col-xs-9">
                            <input type="text" class="form-control" id="firstName" placeholder="Введите номер">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" for="phoneNumber">Дата рождения:</label>
                            <div class="col-xs-9">
                                <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите дату">
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Должность:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите должность">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Зарплата:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите зарплату">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Начало работы:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите дату">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Конец работы:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите дату">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Номер яхты:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите номер">
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
        <p> Номер яхты: {{ $st->yacht_id}}</p>
        <p>Период работы: с {{ $st->start_work }} до {{ $st->finish_work }}</p>
        <p>Должность: {{ $st->position1}}</p>
        <p>Зарплата: {{ $st->salary }} </p>
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
