<div class="regisrtration">
    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1" onclick="revealRegister()">
        Зарегистрироваться
    </button>
</div>
<div class="modal" id="modal1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal">
                <div class="modal-header">
                    <h2>Регистрация владельца яхты</h2>
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="lastName">Фамилия:</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" id="lastName" placeholder="Введите фамилию">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="firstName">Имя:</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" id="firstName" placeholder="Введите имя">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="phoneNumber">Телефон:</label>
                        <div class="col-xs-9">
                            <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputEmail">Email:</label>
                        <div class="col-xs-9">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Введите пароль ещё раз">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Пол:</label>
                        <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="genderRadios" value="male"> Мужской
                            </label>
                        </div>
                        <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="genderRadios" value="female"> Женский
                            </label>
                        </div>
                    </div>
                    <br />
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <input type="submit" class="btn btn-primary" value="Регистрация">
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

