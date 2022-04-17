<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="/style.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center gap-5" style="height: 100vh;">
        <div class="d-flex flex-column" style="width: 400px;">
            <div class="bg-white rounded-3 shadow py-3">
                <div class="row m-0 border-bottom border-primary border-3">
                    <div class="col">
                        <div id="header" class="pt-4 mb-2 text-primary text-center"><i class="bi bi-person"></i> Вход или Регистрация</div>
                    </div>
                </div>
                <form action="/admin" method="POST" class="d-flex flex-column px-4 mt-3">
                    @csrf
                    <a href="#" style="display: none" class="my-1 text-decoration-none" onclick="back()" id="bar"></a>
                    <div id="tel_show" class="form-floating mb-3">
                        <input type="tel" data-tel-input class="form-control" id="tel" placeholder="tel">
                        <label id="tell_mess" for="tel" class="text-muted"><i class="bi bi-telephone"></i> Телефон</label>
                    </div>

                    <div id="psw_show" style="display: none" class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_one" placeholder="password">
                        <div id="show_one" onclick="show(this.id,'password_one')" class="btn btn-eye">
                            <i class="bi bi-eye-slash text-primary fs-5"></i>
                        </div>
                        <label id="lable" for="password_one" class="text-muted">Введите пароль</label>
                    </div>

                    <div id="psw_show_confirm" style="display: none" class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_two" placeholder="password">
                        <div id="show_two" onclick="show(this.id,'password_two')" class="btn btn-eye">
                            <i class="bi bi-eye-slash text-primary fs-5"></i>
                        </div>
                        <label for="password_one" class="text-muted">Повторите пароль</label>
                    </div>

                    <button id="btn_go" type="button" onclick="check()" class="btn-lg btn-primary"><i class="bi bi-box-arrow-in-right"></i> Продолжить</button>
                    <a href="/" class="btn mt-2">Назад</a>
                    <button style="display: none" id="btn_login" type="button" onclick="login()" class="btn-lg btn-primary"><i class="bi bi-box-arrow-in-right"></i> Войти</button>
                    <button style="display: none" id="btn_reg" type="button" onclick="reg()" class="btn-lg btn-primary"><i class="bi bi-person-plus"></i> Зарегистрироваться</button>
                </form>
            </div>
        </div> 
    </div>
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/script.js"></script>
</body>
</html>