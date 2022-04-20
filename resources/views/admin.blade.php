<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin_Panel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/style.css">
    <!-- Ajax -->
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@next"></script>
</head>

<body>
    <div class="main">
        <div class="display-4 text-center mt-3">
            Панель управления
        </div>
        <div class="text-center">
            <a href="/" class="mt-3 btn btn-lg btn-light fs-6" type="submit"><i class="bi bi-arrow-left-circle"></i>
                Выйти из панели управления</a>
        </div>

        <nav class="mt-2">
            <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Общее</button>
                <button class="nav-link" id="nav-main-tab" data-bs-toggle="tab" data-bs-target="#nav-main"
                    type="button" role="tab" aria-controls="nav-main" aria-selected="false">Главная</button>
                <button class="nav-link" id="nav-menu-tab" data-bs-toggle="tab" data-bs-target="#nav-menu"
                    type="button" role="tab" aria-controls="nav-menu" aria-selected="false">Меню</button>
                <button class="nav-link" id="nav-constructor-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-constructor" type="button" role="tab" aria-controls="nav-constructor"
                    aria-selected="false">Конструктор</button>
                <button class="nav-link" id="nav-basket-tab" data-bs-toggle="tab" data-bs-target="#nav-basket"
                    type="button" role="tab" aria-controls="nav-basket" aria-selected="false">Корзина</button>
            </div>
        </nav>

        <div class="tab-content pt-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-12 mt-3">

                        <div class="col">
                            <div class="main bg-light p-2 p-lg-4 m-5">
                                <form action="/main/{{ $main->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-center">Логотип компании</div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="file" name="img_main" value="{{ $main->img_main }}"
                                            class="form-control w-75" placeholder="Логотип компании">
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="text" name="name_main" value="{{ $main->name_main }}"
                                            class="form-control w-75" placeholder="Наз.компании">
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button class="btn btn-warning">Редактирование</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="tab-pane fade" id="nav-main" role="tabpanel" aria-labelledby="nav-main-tab">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-12 mt-3">

                        <div class="col" id="main_home">
                            <div class="main bg-light p-2 p-lg-4 m-5">
                                <form id="main_home_edit">
                                    @csrf
                                    <h2 class="text-center">Главная</h2>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="text" id="name" name="name" class="form-control w-75"
                                            placeholder="Название">
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="text" id="slogan" name="slogan" value="" class="form-control w-75"
                                            placeholder="Слоган">
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="file" name="images" value="" class="form-control w-75"
                                            placeholder="Картинка">
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="text" id="description" name="description" value=""
                                            class="form-control w-75" placeholder="Описание">
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="text" id="servis_a" name="servis_a" class="form-control w-75"
                                            placeholder="Сервис1">
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="text" id="servis_b" name="servis_b" class="form-control w-75"
                                            placeholder="Сервис2">
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input type="text" id="servis_c" name="servis_c" class="form-control w-75"
                                            placeholder="Сервис3">
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button class="btn btn-warning"
                                            v-on:click="edit_main_home">Редактировать</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-menu" role="tabpanel" aria-labelledby="nav-menu-tab">
                Меню
            </div>
            <div class="tab-pane fade" id="nav-constructor" role="tabpanel" aria-labelledby="nav-constructor-tab">
                Конструктор
            </div>
            <div class="tab-pane fade" id="nav-basket" role="tabpanel" aria-labelledby="nav-basket-tab">
                Корзина
            </div>
        </div>

    </div>

    <!-- модальное окно при успешном редоктировании -->
    <button class="d-none" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modaledit"></button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="bg-success py-3 text-center px-3 lead text-white">Редактирование прошло успешно!</div>
                </div>
                <div class="modal-footer">
                    <a href="/" class="btn btn-info text-white">Перейти на главную</a>
                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal"
                        aria-label="Close">Остаться</button>
                </div>
            </div>
        </div>
    </div>
    <!--модальное окно при успешном редактировании конец -->
    <script src="/public/script.js"></script>
    <script src="/admin.js"></script>
</body>

</html>
