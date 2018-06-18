<?php
/**
 * Created by PhpStorm.
 * User: alisa
 * Date: 13.06.18
 * Time: 13:40
 */?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <title>Личный кабинет</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
    <p>{{Auth::user()->email}}</p>
    <a href="/logout">Logout</a>

    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div>
<div class="container" style="margin-top:30px">

    @foreach($yachts as $myYacht)
    <div class="row">
        <div class="col-sm-8">

            <h2>{{$myYacht->mark}}
                {{$myYacht->model}}
            </h2>

            <p>{{$myYacht->price}}</p>
            <p>{{$myYacht->displacement}}</p>
            <p>{{$myYacht->flag}}</p>
            <p>{{$myYacht->portofregistry}}</p>
            <p>{{$myYacht->type}}</p>
        </div>
    </div>
        @endforeach

        <form class="form-horizontal" action="/ownerPage" method="post" >
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
                <div class="form-group" style="display: none">
                    <label class="control-label col-xs-3" for="owner_id">Владелец:</label>
                    <div class="col-xs-9">
                        <input type="boolean" class="form-control" id="owner_id" name="owner_id" value="{{Auth::user()->id}}">
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

<div class="jumbotron text-center" style="margin-bottom:0">
    <p>Яхт клуб 2018</p>
</div>

</body>
</html>
