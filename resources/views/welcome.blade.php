<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доставка еды - Паприка</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    <meta name="msapplication-TileColor" content="#000000">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ffffff">
    <meta name="theme-color" content="#000000">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/style.css">
    <meta name="description"
        content="Доставка еды по городу Дербент, частые акции и вкус нашей еды не оставят вас равнодушными!" />
    <!-- Ajax -->
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@next"></script>
    <style>
        .w-c {
            width: 50%;
        }

        .bg-c {
            background: url(/public/images/bg.jpg);
            background-size: 100%;
            height: 100vh;
        }

        @media (max-width: 600px) {
            .w-c {
                width: 100%;
            }

            .bg-c {
                background-size: 350%;
                background-position: left;
            }
        }
    </style>
</head>

<body>
    <div class="m-0 bg-c" id="main">
        <div class="container-fluid pt-lg-2">
            <div class="row row-cols-1 row-cols-lg-2 pt-lg-2">
                <div class="col col-lg-3 text-light">
                    <div class="box">
                        <div class="box-main pt-lg-4">
                            <div class="d-flex justify-content-center">
                                <img src="/public/storage/folder/{{ $main->img_main }}" alt="" style="width: 100px">
                            </div>
                            <h3 class="text-paprika text-center mt-lg-1">{{ $main->name_main }}</h3>
                            <div style="background: rgba(0, 0, 0, 0.616);" class="d-flex justify-content-center">
                                <a class="m-1 text-light" href="#"><i class="bi bi-whatsapp"></i></a>
                                <a class="m-1 text-light" href="#"><i class="bi bi-telegram"></i></a>
                                <a class="m-1 text-light" href="#"><i class="bi bi-instagram"></i></a>
                            </div>

                            <!-- <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-primary text-light mt-lg-1">Заказать</a>
                            </div>-->

                            <!--Navs and tabs-->
                            <div>
                                <div class="d-flex justify-content-center">
                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="btn text-light active fs-5 mt-lg-2" id="v-pills-home-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button"
                                            role="tab" aria-controls="v-pills-home"
                                            aria-selected="true">Главная</button>
                                        <button class="btn text-light fs-5 mt-lg-1" id="v-pills-profile-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button"
                                            role="tab" aria-controls="v-pills-profile"
                                            aria-selected="false">Меню</button>
                                        <button class="btn text-light fs-5 mt-lg-1" id="v-pills-messages-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button"
                                            role="tab" aria-controls="v-pills-messages"
                                            aria-selected="false">Конструктор</button>
                                        <button class="btn text-light fs-5 mt-lg-1 mb-lg-2" id="v-pills-settings-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button"
                                            role="tab" aria-controls="v-pills-settings"
                                            aria-selected="false">Корзина</button>
                                    </div>
                                </div>
                            </div>
                            <!--Navs and tabs end-->

                        </div>
                    </div>
                </div>
                <div class="col-12 mt-lg-0 col-lg-9 text-light">
                    <div class="box">
                        <div class="box-second pt-lg-4">
                            <!--Btn offcanvas начало-->
                            <div class="btn-offcanvas">
                                <button class="btn text-light ms-2 mt-2 fs-1" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                    <i class="bi bi-list-ul"></i>
                                </button>
                            </div>

                            <!--modal offcanvas Начало-->
                            <div style="width: 75%; height: 97vh;" class="offcanvas offcanvas-start offcanvas_modal"
                                tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas_modal_shadow">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
                                        <button type="button" class="btn-close text-reset d-none"
                                            data-bs-dismiss="offcanvas" aria-label="Close"
                                            id="btnClose_canvas"></button>
                                    </div>
                                    <div class="offcanvas-body text-light">
                                        <div class="d-flex justify-content-center">
                                            <img src="/public/storage/folder/{{ $main->img_main }}" alt="" width="150px"
                                                style="width: 150px">
                                        </div>
                                        <h1 class="text-paprika text-center mt-lg-1">{{ $main->name_main }}</h1>
                                        <div style="background: rgba(0, 0, 0, 0.616);"
                                            class="d-flex justify-content-center mt-2">
                                            <a class="m-1 fs-4 text-light" href="#"><i class="bi bi-whatsapp"></i></a>
                                            <a class="m-1 fs-4 text-light" href="#"><i class="bi bi-telegram"></i></a>
                                            <a class="m-1 fs-4 text-light" href="#"><i class="bi bi-instagram"></i></a>
                                        </div>

                                        <!-- <div class="d-flex justify-content-center">
                                                                        <a href="#" class="btn btn-primary text-light mt-lg-1">Заказать</a>
                                                                    </div>-->

                                        <!--Navs and tabs-->
                                        <div>
                                            <div class="d-flex justify-content-center mt-2">
                                                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                                    aria-orientation="vertical">
                                                    <button class="btn text-light active fs-3 mt-lg-1"
                                                        id="v-pills-home-tab" data-bs-toggle="pill"
                                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                                        aria-controls="v-pills-home" aria-selected="true"
                                                        onclick="btnClose()">Главная</button>
                                                    <button class="btn text-light fs-3 mt-lg-1" id="v-pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                                                        type="button" role="tab" aria-controls="v-pills-profile"
                                                        aria-selected="false" onclick="btnClose()">Меню</button>
                                                    <button class="btn text-light fs-3 mt-lg-1"
                                                        id="v-pills-messages-tab" data-bs-toggle="pill"
                                                        data-bs-target="#v-pills-messages" type="button" role="tab"
                                                        aria-controls="v-pills-messages" aria-selected="false"
                                                        onclick="btnClose()">Конструктор</button>
                                                    <button class="btn text-light fs-3 mt-lg-1 mb-lg-2"
                                                        id="v-pills-settings-tab" data-bs-toggle="pill"
                                                        data-bs-target="#v-pills-settings" type="button" role="tab"
                                                        aria-controls="v-pills-settings" aria-selected="false"
                                                        onclick="btnClose()">Корзина</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Navs and tabs end-->
                                    </div>
                                </div>
                            </div>
                            <!--modal offcanvas конец-->

                            <!--Btn offcanvas конец-->

                            <!--Navs and tabs start-->
                            <div class="tab-content" id="v-pills-tabContent">
                                <!--Главная начало-->
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="div-main d-flex justify-content-center flex-column">

                                        <div class="d-flex justify-content-center">
                                            <img src="/storage/main_home/{{ $main_home->images }}" alt=""
                                                style="width: 150px">
                                        </div>

                                        <div class="d-flex justify-content-center mt-2">
                                            <span class="fs-2 fw-bold bg-warning px-4 py-3 rounded-pill text-dark">{{
                                                $main_home->name }}
                                            </span>
                                        </div>
                                        <p class="text-center mt-1 fs-5">{{ $main_home->slogan }}
                                        </p>



                                        <div class="text-wrap mt-2 px-3 px-lg-5 mt-lg-2 text-center">
                                            {{ $main_home->description }}
                                        </div>


                                        <div class="d-flex mt-1 px-3 pt-3 justify-content-evenly pt-lg-5 flex-wrap">
                                            <div class="bg-dark px-4 py-3 rounded-pill text-light lead">
                                                {{ $main_home->servis_a }}
                                            </div>
                                            <div class="bg-dark px-4 py-3 rounded-pill text-light lead mt-2 mt-lg-0">
                                                {{ $main_home->servis_b }}</div>
                                            <div class="bg-dark px-4 py-3 rounded-pill text-light lead mt-2 mt-lg-0">
                                                {{ $main_home->servis_c }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--Главная конец-->

                                <!--Меню начало-->
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="div-menu mt-2  mt-lg-0  mb-lg-5">
                                        <!--Карточки с чуду начало-->
                                        @foreach ($category as $item)
                                        <div class="mt-2 mt-lg-0">
                                            <div class="text-start fs-1 fw-bold">{{ $item->name }}</div>
                                            <div class="card-chudu mt-3">

                                                <div class="row row-cols-lg-3">
                                                    @foreach ($category_card->where('type', $item->id) as $item_card)
                                                    <div class="col mt-lg-1 ">
                                                        <div class="card border-0 rounded-3" style="height: 410px;">
                                                            <img src="/storage/card/{{ $item_card->img }}"
                                                                style="height: 200px; object-fit: cover;"
                                                                class="card-img-top" alt="...">
                                                            <div class="card-body text-black">
                                                                <h3 class="card-title text-center">
                                                                    {{ $item_card->name }}
                                                                </h3>
                                                                <p class="card-text">
                                                                    {{ $item_card->description }}</p>
                                                                <p class="text-start">Цена:
                                                                    {{ $item_card->price }}₽</p>
                                                                <div class="d-flex justify-content-center">
                                                                    <button id="card{{ $item_card->id }}"
                                                                        v-on:click="addbasket('{{ $item_card->id }}')"
                                                                        class="btn btn-warning text-dark"><i
                                                                            class="bi bi-minecart"></i>
                                                                        В корзину</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--Карточки с чуду конец-->



                                    </div>
                                </div>
                                <!--Меню конец-->

                                <!--конструктор начало-->
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="div-designer">

                                        <div class="text-center fs-1">
                                            Конструктор
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-lg text-light active fs-5"
                                                        id="pills-home-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-home" type="button" role="tab"
                                                        aria-controls="pills-home" aria-selected="true">Пиццы</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn btn-lg text-light fs-5" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button" role="tab" aria-controls="pills-profile"
                                                        aria-selected="false">Чуду</button>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-content" id="pills-tabContent">
                                            <!-- конструктор Пицца начало-->
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div>
                                                    <div class="const-pizza">
                                                        <div class="row row-cols-lg-1">

                                                            <div class="col">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <div>
                                                                        <img src="/images/pizza2.png" alt=""
                                                                            class="mx-auto d-block"
                                                                            style="width: 200px">
                                                                    </div>

                                                                    <div class=" d-flex flex-column text-center lead">
                                                                        <span style="font-weight: 600">Пицца
                                                                            содержит:</span>
                                                                        <span class="lead mt-2">Тесто</span>
                                                                        <div class="mt-1">
                                                                            Толстое
                                                                            <input class="form-check-input" value="150"
                                                                                v-model="testo_pizza" type="radio"
                                                                                name="flexRadioDefault"
                                                                                id="flexRadioDefault3">
                                                                            Тонкое
                                                                            <input class="form-check-input" value="100"
                                                                                v-model="testo_pizza" type="radio"
                                                                                name="flexRadioDefault"
                                                                                id="flexRadioDefault4">
                                                                        </div>
                                                                    </div>
                                                                    <div v-for="(item, ib) in ingradient_pizza"
                                                                        :key="item"
                                                                        class="text-center border-1 border-light border-bottom">
                                                                        <span>@{{ item.name }}: (порция- @{{ item.gramm
                                                                            }} гр)</span>
                                                                        <button class="btn fs-3 mb-2 text-light"
                                                                            v-on:click="minus_ingridient(ib)">-</button>
                                                                        <span
                                                                            class="border border-secondary px-2 py-1">@{{
                                                                            item.colvo }}</span>
                                                                        <button class="btn fs-3 mb-2 text-light"
                                                                            v-on:click="plus_ingridient(ib)">+</button>
                                                                        <span class="fs-5 ms-lg-5 ms-0">
                                                                            @{{ item.price }}₽
                                                                        </span>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--footer Пицца конструктор начало-->
                                                    <button v-if="testo_pizza != 0"
                                                        style="position: relative; bottom: 0px; background: rgba(0, 0, 0, 0.9); border-radius: 1% 1% 10% 10%;"
                                                        class="w-100 d-block border border-0 text-white fs-4 py-2 py-lg-1 mt-1 mt-lg-0"
                                                        id="pizza" v-on:click="add_basket_pizza">
                                                        Собрать за: @{{Number(colvo_pizza)+Number(testo_pizza)}}₽
                                                    </button>
                                                    <button v-else
                                                        style="position: relative; bottom: 0px; background: rgba(0, 0, 0, 0.9); border-radius: 1% 1% 10% 10%;"
                                                        class="w-100 d-block border border-0 text-white fs-4 py-2 py-lg-1 mt-1 mt-lg-0">
                                                        Выберите тесто
                                                    </button>
                                                    <!--footer Пицца конструктор конец-->
                                                </div>
                                            </div>
                                            <!-- конструктор Пицца конец-->

                                            <!-- конструктор Чуду начало-->
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">
                                                <div>
                                                    <div class="const-chudu">
                                                        <div class="row row-cols-lg-1">

                                                            <div class="col">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <div>
                                                                        <img src="images/chudu111.jpg" alt=""
                                                                            class="mx-auto d-block"
                                                                            style="width: 200px">
                                                                    </div>

                                                                    <div class=" d-flex flex-column text-center lead">
                                                                        <span style="font-weight: 600">Чуду
                                                                            содержит:</span>
                                                                        <span class="lead mt-2">Тесто</span>
                                                                        <div class="mt-1">
                                                                            Толстое
                                                                            <input class="form-check-input" type="radio"
                                                                                name="flexRadioDefault"
                                                                                id="flexRadioDefault3" value="100"
                                                                                v-model="testo_chudu">
                                                                            Тонкое
                                                                            <input class="form-check-input mt-2"
                                                                                type="radio" name="flexRadioDefault"
                                                                                id="flexRadioDefault4" value="200"
                                                                                v-model="testo_chudu">
                                                                        </div>
                                                                    </div>

                                                                    <div v-for="(item, ib) in ingradient_chudu"
                                                                        class="text-center border-1 border-light border-bottom">
                                                                        <span>@{{ item.name }}: (порция- @{{ item.gramm
                                                                            }} гр)</span>
                                                                        <button class="btn fs-3 mb-2 text-light"
                                                                            v-on:click="minus_ingridient_chudu(ib)">-</button>
                                                                        <span
                                                                            class="border border-secondary px-2 py-1">@{{
                                                                            item.colvo }}</span>
                                                                        <button class="btn fs-3 mb-2 text-light"
                                                                            v-on:click="plus_ingridient_chudu(ib)">+</button>
                                                                        <span class="fs-5 ms-lg-5 ms-0">
                                                                            @{{ item.price }}₽
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--footer конструктор начало-->
                                                    <button v-if="testo_chudu != 0"
                                                        style="position: relative; bottom: 0px; background: rgba(0, 0, 0, 0.9); border-radius: 1% 1% 10% 10%;"
                                                        class="w-100 d-block border border-0 text-white fs-4 py-2 py-lg-1 mt-1 mt-lg-0"
                                                        id="chudu" v-on:click="add_basket_chudu">
                                                        Собрать за: @{{Number(colvo_chudu)+Number(testo_chudu)}}₽
                                                    </button>
                                                    <button v-else
                                                        style="position: relative; bottom: 0px; background: rgba(0, 0, 0, 0.9); border-radius: 1% 1% 10% 10%;"
                                                        class="w-100 d-block border border-0 text-white fs-4 py-2 py-lg-1 mt-1 mt-lg-0"
                                                        id="chudu">
                                                        Выберите тесто
                                                    </button>
                                                    <!--footer конструктор конец-->
                                                </div>
                                            </div>
                                            <!-- конструктор Чуду конец-->

                                        </div>



                                    </div>
                                </div>
                                <!--конструктор конец-->

                                <!--Корзина начало-->
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <div class="text-center fs-2 fw-bold">Подтвердите свой заказ</div>
                                    <div class="div-basket ps-lg-4">
                                        <div class="row row row-cols-1 row-cols-lg-3">

                                            <div :key='item' v-for="(item ,ib) in card"
                                                class="col mt-2 mt-lg-4 ms-lg-0">
                                                <div class="card border-0 rounded-3" style=" height: 400px;">
                                                    <img :src="'/storage/card/' + item.img"
                                                        style="height: 200px; object-fit: cover;" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body text-black">
                                                        <h3 class="card-title text-center">@{{ item.name }}
                                                        </h3>
                                                        <p class="card-text">@{{ item.description }}</p>
                                                        <div class="d-flex flex-column">
                                                            <span>Цена: @{{ item.price }}₽</span>
                                                            <div class="d-flex">
                                                                <span class="">Кол.во:
                                                                    <button v-on:click="minus(item.id)"
                                                                        class="btn fs-3 mb-2">
                                                                        -
                                                                    </button>
                                                                    <span class="border border-secondary px-2 py-1">
                                                                        @{{ item.colvo }}
                                                                    </span>
                                                                    <button v-on:click="plus(item.id)"
                                                                        class="btn fs-3 mb-2">
                                                                        +
                                                                    </button>
                                                                </span>
                                                                <button v-on:click="delcard(ib)"
                                                                    class="btn text-danger">Удалить</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--footer корзина начало-->
                                    <button
                                        style="position: relative; bottom: 0; background: rgba(0, 0, 0, 0.9); border-radius: 1% 1% 10% 10%;"
                                        class="fixed-bottom border-0 fs-4 py-2 py-lg-1 mt-2 mt-lg-0  fs-4 w-100 d-block text-white"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Купить за @{{itogo}}₽
                                    </button>

                                    <!-- Modal footer корзина начало -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog text-black">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title2 lead">Оформите заказ</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" id="close_arrange"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="add_arrange">
                                                        @csrf
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="name" v-model="name"
                                                                class="form-control bg-light" id="floatingInput"
                                                                placeholder="Введите номер телефона">
                                                            <label for="floatingInput">Имя</label>
                                                            <div class="mb-2 text-danger">@{{ error_name }}</div>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="tel" name="tel" v-model="tel"
                                                                class="form-control bg-light" id="floatingInput"
                                                                placeholder="Введите номер телефона">
                                                            <label for="floatingInput">Номер телефона</label>
                                                            <div class="mb-2 text-danger">@{{ error_tel }}</div>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="address" v-model="address"
                                                                class="form-control bg-light" id="floatingInput"
                                                                placeholder="Введите номер телефона">
                                                            <label for="floatingInput">Адрес доставки (Улица, дом,
                                                                корпус)</label>
                                                            <div class="mb-2 text-danger">@{{ error_address }}</div>
                                                        </div>

                                                        <!--
                                                           <div class="d-flex justify-content-around mb-3">

                                                            <div style="font-size: 9pt;" class="form-floating ps-2">
                                                                <input type="text" name="address"
                                                                    class="form-control bg-light w-75"
                                                                    id="floatingInput"
                                                                    placeholder="Введите номер телефона">
                                                                <label for="floatingInput">Кв/Офис</label>
                                                            </div>
                                                            <div style="font-size: 8pt;" class="form-floating ps-2">
                                                                <input type="text" name="address"
                                                                    class="form-control px-4 bg-light w-75"
                                                                    id="floatingInput"
                                                                    placeholder="Введите номер телефона">
                                                                <label for="floatingInput">Домофон</label>
                                                            </div>
                                                            <div style="font-size: 9pt;" class="form-floating ps-2">
                                                                <input type="text" name="address"
                                                                    class="form-control bg-light w-75"
                                                                    id="floatingInput"
                                                                    placeholder="Введите номер телефона">
                                                                <label for="floatingInput">Подъезд</label>
                                                            </div>
                                                            <div style="font-size: 9pt;" class="form-floating ps-2">
                                                                <input type="text" name="address"
                                                                    class="form-control bg-light w-75"
                                                                    id="floatingInput"
                                                                    placeholder="Введите номер телефона">
                                                                <label for="floatingInput">Этаж</label>
                                                            </div>

                                                        </div>
                                                        -->
                                                        <label class="small text-black">Сообщение для
                                                            курьера (№Кв/офис, Домофон, Подъезд, Этаж)</label>
                                                        <div class="form-floating mb-3 py-1 mt-1">
                                                            <textarea name="message" v-model="message"
                                                                class="form-control pt-3"
                                                                placeholder="Leave a comment here"
                                                                id="floatingTextarea_mess"></textarea>
                                                            <div class="mb-2 text-danger">
                                                                @{{ error_message }}
                                                            </div>
                                                        </div>


                                                        <div
                                                            class="d-flex border border-secondary flex-column py-2 mb-2 px-4 rounded-2">
                                                            <div
                                                                class="d-flex border-1 border-secondary border-bottom py-2">
                                                                <span class="fs-4">Товары</span>
                                                                <span class="ms-auto fs-4">Сумма</span>
                                                            </div>

                                                            <div :key='item' v-for="(item ,ib) in card"
                                                                class="d-flex border-1 border-secondary border-bottom py-2">
                                                                <span class="">@{{ item.name }}</span>
                                                                <span class="ms-2"> * @{{ item.colvo }}</span>
                                                                <span class="ms-auto">@{{ item.colvo * item.price }} ₽
                                                                </span>
                                                            </div>

                                                        </div>

                                                        <div
                                                            class="border border-1 border-secondary rounded-2 py-3 mb-3">
                                                            <h3 class="text-center">Оплата</h3>
                                                            <div class="row mt-2">
                                                                <div class="col ps-lg-4">
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                value="Наличные" v-model="sposob"
                                                                                name="sposob" id="flexRadioDefault1">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
                                                                                Наличными
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check ms-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                value="СберОнлайн" name="sposob"
                                                                                v-model="sposob" id="flexRadioDefault2">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault2">
                                                                                СберОнлайн
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 text-center text-danger">
                                                                @{{ error_sposob }}
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="sum" v-model="itogo">

                                                        <h1 class="text-center mb-1">Итого: @{{itogo}}₽</h1>
                                                        <button v-on:click="arrange"
                                                            class="btn btn-primary w-100 mt-2 py-2"
                                                            class="d-none">Оформить</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Назад</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- модальное окно при успешной отправке заявки -->
                                    <button class="d-none" id="arrange_suc" data-bs-toggle="modal"
                                        data-bs-target="#arrange_form"></button>

                                    <div class="modal fade" id="arrange_form" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class=" py-3 text-center fs-1 px-3 lead text-success"><i
                                                            class="bi bi-check2-circle"></i>
                                                    </div>
                                                    <div class="fs-4 text-center px-2 lead text-dark">Спасибо
                                                        <span>ваш заказ уже готовится</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary text-white"
                                                        data-bs-dismiss="modal" aria-label="Close">Окей</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--модальное окно при успешной отправке заявки конец -->


                                    <!-- Modal footer корзина конец -->

                                    <!-- Начало заказ оформлен -->
                                    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal"
                                        data-bs-target="#arrange_success"></button>

                                    <div class="modal fade" id="arrange_success" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body d-flex flex-column">
                                                    <i class="bi bi-check-lg fs-1 text-success"></i>
                                                    <h4>Заказ оформлен</h4>
                                                    <p>Ожидайте доставки</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Конец заказ офрмлен -->

                                    <!--footer корзина конец-->
                                </div>
                                <!--Корзина конец-->
                            </div>
                            <!--Navs and tabs end-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let input = document.querySelector("#floatingTextarea_mess");
        let label = document.querySelector('label[for="floatingTextarea_mess"]');
        input.addEventListener("focus", () => {
            label.style.visibility = "hidden";
        });
        input.addEventListener("blur", () => {
            label.style.visibility = "visible";
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="/public/script.js"></script>
    <script>
        function btnClose() {
            btnClose_canvas.click()
        }
    </script>
    <script src="/basket.js"></script>
    <script src="/const.js"></script>
</body>

</html>