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
                    aria-selected="false">Конструктор пиццы</button>
                <button class="nav-link" id="nav-basket-tab" data-bs-toggle="tab" data-bs-target="#nav-basket"
                    type="button" role="tab" aria-controls="nav-basket" aria-selected="false">Конструктор чуду</button>
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
                <div class="container" id="main_menu">
                    <div class="d-flex mb-3">
                        <h3 class="fw-bold">Категории меню</h3>
                        <button class="ms-auto btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#exampleModalcategory"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-12 mt-3">

                        <div v-for="(item, ib) in category" :key='item' class="col mt-2">

                            <div class="accordion" :id="'accordionExample' + item.id"> {{-- Присвоение каждому свой id --}}
                                <div class="accordion-item">
                                    <h2 class="accordion-header d-flex gap-2" :id="'heading' + item.id">
                                        <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            :data-bs-target="'#collapse' + item.id" aria-expanded="true"
                                            :aria-controls="'collapse' + item.id">
                                            @{{ item.name }}
                                        </div>
                                        <button class="btn btn-warning ms-auto px-3" data-bs-toggle="modal"
                                            :data-bs-target="'#exampleModalcategoryedit' + item.id"><i
                                                class="bi bi-pencil"></i></button>
                                        <button class="btn btn-danger px-3" data-bs-toggle="modal"
                                            :data-bs-target="'#exampleModalcategorydelete' + item.id"><i
                                                class="bi bi-basket"></i></button>
                                    </h2>
                                    <div :id="'collapse' + item.id" class="accordion-collapse collapse"
                                        :aria-labelledby="'heading' + item.id" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-light">
                                            <div class="bg-light">
                                                <div class="d-flex">
                                                    <button
                                                        class="btn btn-success ms-auto w-100 text-white d-flex justify-content-center"
                                                        data-bs-toggle="modal"
                                                        :data-bs-target="'#exampleModaladdcard' + item.id"><i
                                                            class="bi bi-plus-circle me-2"></i>
                                                        Добавить</button>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row row-cols-lg-3 row-cols-1">

                                                    <div v-for="prom in card.filter(citem => citem.type.match(item.id))"
                                                        class="col mt-3">

                                                        <div class="card border-secondary bg-light"
                                                            style="height: 410px;">
                                                            <img :src="'/storage/card/' + prom.img"
                                                                {{-- вывод картинки в шаблон vue3 --}}
                                                                style="height: 200px; object-fit: cover;"
                                                                class="card-img-top" alt="...">
                                                            <div class="card-body text-black">
                                                                <h3 class="card-title text-center">
                                                                    @{{ prom.name }}</h3>
                                                                <p class="card-text">@{{ prom.description }}</p>
                                                                <p class="text-start">Цена: @{{ prom.price }}₽
                                                                </p>
                                                                <div class="d-flex">
                                                                    <button data-bs-toggle="modal"
                                                                        :data-bs-target="'#editcard' + prom.id"
                                                                        class="btn btn-warning w-50 text-dark me-1"><i
                                                                            class="bi bi-basket"></i> Ред.</button>
                                                                    <button data-bs-toggle="modal"
                                                                        :data-bs-target="'#deletecard' + prom.id"
                                                                        class="btn btn-danger text-light w-50 me-1"><i
                                                                            class="bi bi-basket"></i> Удалить</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Модальное окно удаления карточки категории в меню -->
                                                        <div class="modal fade" :id="'deletecard' + prom.id"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button :id="'closedeletecard' + prom.id"
                                                                            type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3 class="text-center">Вы действительно
                                                                            хотите удалить категорию?</h3>
                                                                        <div class="d-flex justify-content-center mt-3">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Назад</button>
                                                                            <button class="btn btn-danger ms-2"
                                                                                v-on:click='deleteСategorycard(prom.id)'>Удалить</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Назад</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Модальное окно удаления карточки категории в меню конец -->

                                                        <!-- Модальное окно редактирования карточки категории в меню -->
                                                        <div class="modal fade" :id="'editcard' + prom.id"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Редактировать
                                                                            Карточку
                                                                        </h5>
                                                                        <button :id="'close_edit_card' + prom.id"
                                                                            type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form :id="'editformCategory_card' + prom.id">
                                                                            @csrf
                                                                            <input type="file" name="img"
                                                                                class="form-control"
                                                                                :id="'edit_card_img' + prom.id"
                                                                                placeholder="name@example.com">

                                                                            <div class="text-danger mb-3">
                                                                                @{{ error_edit_card_img }}
                                                                            </div>

                                                                            <div class="form-floating mt-2">
                                                                                <input type="text" v-model='prom.name'
                                                                                    name="name" class="form-control"
                                                                                    id="floatingInput"
                                                                                    placeholder="name@example.com">
                                                                                <label
                                                                                    for="floatingInput">Название</label>
                                                                            </div>
                                                                            <div class="text-danger mb-3">
                                                                                @{{ error_edit_card_name }}
                                                                            </div>

                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    v-model='prom.description'
                                                                                    name="description"
                                                                                    class="form-control"
                                                                                    id="floatingInput"
                                                                                    placeholder="name@example.com">
                                                                                <label
                                                                                    for="floatingInput">Описание</label>
                                                                            </div>
                                                                            <div class="text-danger mb-3">
                                                                                @{{ error_edit_card_description }}
                                                                            </div>

                                                                            <div class="form-floating">
                                                                                <input type="text" v-model='prom.price'
                                                                                    name="price" class="form-control"
                                                                                    id="floatingInput"
                                                                                    placeholder="name@example.com">
                                                                                <label for="floatingInput">Цена</label>
                                                                            </div>
                                                                            <div class="text-danger mb-3">
                                                                                @{{ error_edit_card_price }}
                                                                            </div>

                                                                            <button type="button"
                                                                                class="btn btn-primary text-white"
                                                                                v-on:click="editСategory_card(prom.id)">Изменить</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Назад</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Модальное окно редактирования карточки категории в меню конец -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <!-- Модальное окно добовления карточки категории в меню -->
                            <div class="modal fade" :id="'exampleModaladdcard' + item.id" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Добавить карточку</h5>
                                            <button :id="'close_add_card' + item.id" type="button"
                                                class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form :id="'addformCategory_card' + item.id">
                                                @csrf
                                                <input type="file" name="img" class="form-control"
                                                    :id="'add_card_img' + item.id" placeholder="name@example.com">

                                                <div class="text-danger mb-3">
                                                    @{{ error_add_card_img }}
                                                </div>

                                                <div class="form-floating mt-2">
                                                    <input type="text" v-model='add_card_name' name="name"
                                                        class="form-control" id="floatingInput"
                                                        placeholder="name@example.com">
                                                    <label for="floatingInput">Название</label>
                                                </div>
                                                <div class="text-danger mb-3">
                                                    @{{ error_add_card_name }}
                                                </div>

                                                <div class="form-floating">
                                                    <input type="text" v-model='add_card_description' name="description"
                                                        class="form-control" id="floatingInput"
                                                        placeholder="name@example.com">
                                                    <label for="floatingInput">Описание</label>
                                                </div>
                                                <div class="text-danger mb-3">
                                                    @{{ error_add_card_description }}
                                                </div>

                                                <div class="form-floating">
                                                    <input type="text" v-model='add_card_price' name="price"
                                                        class="form-control" id="floatingInput"
                                                        placeholder="name@example.com">
                                                    <label for="floatingInput">Цена</label>
                                                </div>
                                                <div class="text-danger mb-3">
                                                    @{{ error_add_card_price }}
                                                </div>

                                                <button type="button" class="btn btn-primary text-white"
                                                    v-on:click="addСategory_card(ib)">Добавить</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Назад</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Модальное окно добовления карточки категории в меню конец-->

                            <!-- Модальное окно редактирования категории в меню -->
                            <div class="modal fade" :id="'exampleModalcategoryedit' + item.id" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Редактировать категорию
                                            </h5>
                                            <button id="close_edit_category" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editformСategory">
                                                @csrf
                                                <div class="form-floating">
                                                    <input v-model="item.name" type="text" name="name"
                                                        class="form-control" id="floatingInput"
                                                        placeholder="name@example.com">
                                                    <label for="floatingInput">Название</label>
                                                </div>
                                                <div class="text-danger mb-3">
                                                    @{{ error_edit_name }}
                                                </div>
                                                <button type="button" class="btn btn-primary text-white"
                                                    v-on:click="editСategory(ib)">Изменить</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Назад</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Модальное окно редактирования категории в меню конец -->


                            <!-- Модальное окно удалении категории в меню -->
                            <div class="modal fade" :id="'exampleModalcategorydelete' + item.id" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                            </h5>
                                            <button :id="'close_delete_category' + item.id" type="button"
                                                class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 class="text-center">Вы действительно хотите удалить категорию?</h3>
                                            <div class="d-flex justify-content-center mt-3">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Назад</button>
                                                <button class="btn btn-danger ms-2"
                                                    v-on:click='deleteСategory(ib)'>Удалить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Модальное окно Удалении категории в меню конец -->

                        </div>


                    </div>
                    <!-- Модальное окно добовления категории в меню -->
                    <div class="modal fade" id="exampleModalcategory" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Добавить категорию</h5>
                                    <button id="close_add_category" type="button" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addformСategory">
                                        @csrf
                                        <div class="form-floating">
                                            <input v-model="add_name" type="text" name="name" class="form-control"
                                                id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Название</label>
                                        </div>
                                        <div class="text-danger mb-3">
                                            @{{ error_add_name }}
                                        </div>
                                        <button type="button" class="btn btn-primary text-white"
                                            v-on:click="addСategory">Добавить</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Назад</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Модальное окно добовления категории в меню конец-->




                </div>
            </div>
            <!--конструктор пиццы начало-->
            <div class="tab-pane fade" id="nav-constructor" role="tabpanel" aria-labelledby="nav-constructor-tab">
                <div class="container" id="div_const_pizza">
                    <div class="row row-cols-1 row-cols-lg-12 mt-3">

                        <div class="col">
                            <div class="main bg-light p-2 p-lg-4 m-5">
                                <div class="text-center fs-3">
                                    Добавление ингредиентов в пиццу
                                </div>
                                <form id="const_pizza" class="mt-3">
                                    @csrf
                                    <div class="d-flex justify-content-center mt-1">
                                        <input v-model="add_name" type="text" id="name" name="name"
                                            class="form-control w-75" placeholder="Название ингредиента">
                                    </div>
                                    <div class="text-danger text-center mt-1 mb-3">
                                        @{{ error_add_name }}
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input v-model="add_gramm" type="text" id="gramm" name="gramm"
                                            class="form-control w-75" placeholder="Граммы">
                                    </div>
                                    <div class="text-danger text-center mt-1 mb-3">
                                        @{{ error_add_gramm }}
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input v-model="add_price" type="text" id="price" name="price"
                                            class="form-control w-75" placeholder="Цена за порцию">

                                    </div>
                                    <div class="text-danger text-center mt-1 mb-3">
                                        @{{ error_add_price }}
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button class="btn btn-primary w-50"
                                            v-on:click="add_const_pizza">Добавить</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div v-for="(item, ib) in ingradient" :key='item' class="col">
                            <div class="bg-light py-3">
                                <div class="text-center border-1 border-light border-bottom">
                                    <span> @{{ item.name }}: (порция- @{{ item.gramm }} гр)</span>
                                    <button class="btn fs-3 mb-2 text-dark">-</button>
                                    <span class="border border-secondary px-2 py-1">1</span>
                                    <button class="btn fs-3 mb-2 text-dark">+</button>
                                    <span class="fs-5 ms-lg-5">
                                        @{{ item.price }}₽
                                    </span>
                                    <button class="btn mb-2 ms-3" data-bs-toggle="modal"
                                        :data-bs-target="'#delete_ingradient' + item.id">
                                        <i class="bi bi-basket fs-4 text-danger"></i>
                                    </button>
                                    <button class="btn mb-2 ms-1" data-bs-toggle="modal"
                                        :data-bs-target="'#edit_ingradient' + item.id">
                                        <i class="bi bi-pencil text-warning fs-4"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Модальное окно редактирования инградиентов в конструкторе пицца в меню -->
                            <div class="modal fade" :id="'edit_ingradient' + item.id" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Редактировать ингредиент
                                            </h5>
                                            <button :id="'close_edit_ingradient' + item.id" type="button"
                                                class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form :id="'edit_ingradient_form' + item.id">
                                                @csrf
                                                <div class="d-flex justify-content-center mt-1">
                                                    <input v-model="item.name" type="text" :id="'name' + item.id"
                                                        name="name" class="form-control w-75"
                                                        placeholder="Название ингредиента">
                                                </div>
                                                <div class="text-danger text-center mt-1 mb-3">
                                                    @{{ error_edit_name }}
                                                </div>
                                                <div class="d-flex justify-content-center mt-1">
                                                    <input v-model="item.gramm" type="text" :id="'gramm' + item.id"
                                                        name="gramm" class="form-control w-75" placeholder="Граммы">
                                                </div>
                                                <div class="text-danger text-center mt-1 mb-3">
                                                    @{{ error_edit_gramm }}
                                                </div>
                                                <div class="d-flex justify-content-center mt-1">
                                                    <input v-model="item.price" type="text" :id="'price' + item.id"
                                                        name="price" class="form-control w-75"
                                                        placeholder="Цена за порцию">

                                                </div>
                                                <div class="text-danger text-center mt-1 mb-3">
                                                    @{{ error_edit_price }}
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-primary text-white"
                                                        v-on:click="editingradient(ib)">Изменить</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Назад</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Модальное окно редактирования инградиентов в конструкторе пицца  в меню конец -->

                            <!-- Modal удаления ингредиентов в конструкторе пицца -->
                            <div class="modal fade" :id="'delete_ingradient' + item.id" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                            </h5>
                                            <button :id="'close_delete_ingradient' + item.id" type="button"
                                                class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 class="text-center">Вы действительно хотите удалить категорию?</h3>
                                            <div class="d-flex justify-content-center mt-3">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Назад</button>
                                                <button class="btn btn-danger ms-2"
                                                    v-on:click='deleteingradient(ib)'>Удалить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal удаления ингредиентов в конструкторе пицца конец -->

                        </div>

                    </div>
                </div>



            </div>

            <!--Конструктор чуду начало-->
            <div class="tab-pane fade" id="nav-basket" role="tabpanel" aria-labelledby="nav-basket-tab">
                <div class="container" id="div_const_chudu">
                    <div class="row row-cols-1 row-cols-lg-12 mt-3">

                        <div class="col">
                            <div class="main bg-light p-2 p-lg-4 m-5">
                                <div class="text-center fs-3">
                                    Добавление ингредиентов в Чуду
                                </div>
                                <form id="const_chudu" class="mt-3">
                                    @csrf
                                    <div class="d-flex justify-content-center mt-1">
                                        <input v-model="add_name" type="text" id="name" name="name"
                                            class="form-control w-75" placeholder="Название ингредиента">
                                    </div>
                                    <div class="text-danger text-center mt-1 mb-3">
                                        @{{ error_add_name }}
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input v-model="add_gramm" type="text" id="gramm" name="gramm"
                                            class="form-control w-75" placeholder="Граммы">
                                    </div>
                                    <div class="text-danger text-center mt-1 mb-3">
                                        @{{ error_add_gramm }}
                                    </div>
                                    <div class="d-flex justify-content-center mt-1">
                                        <input v-model="add_price" type="text" id="price" name="price"
                                            class="form-control w-75" placeholder="Цена за порцию">

                                    </div>
                                    <div class="text-danger text-center mt-1 mb-3">
                                        @{{ error_add_price }}
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button class="btn btn-primary w-50" v-on:click="add_const">Добавить</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div v-for="(item, ib) in ingradient" :key='item' class="col">
                            <div class="bg-light py-3">
                                <div class="text-center border-1 border-light border-bottom">
                                    <span> @{{ item.name }}: (порция- @{{ item.gramm }} гр)</span>
                                    <button class="btn fs-3 mb-2 text-dark">-</button>
                                    <span class="border border-secondary px-2 py-1">1</span>
                                    <button class="btn fs-3 mb-2 text-dark">+</button>
                                    <span class="fs-5 ms-lg-5">
                                        @{{ item.price }}₽
                                    </span>
                                    <button class="btn mb-2 ms-3" data-bs-toggle="modal"
                                        :data-bs-target="'#delete_ingradient' + item.id">
                                        <i class="bi bi-basket fs-4 text-danger"></i>
                                    </button>
                                    <button class="btn mb-2 ms-1" data-bs-toggle="modal"
                                        :data-bs-target="'#edit_ingradient' + item.id">
                                        <i class="bi bi-pencil text-warning fs-4"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Модальное окно редактирования инградиентов в конструкторе  в меню -->
                            <div class="modal fade" :id="'edit_ingradient' + item.id" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Редактировать ингредиент
                                            </h5>
                                            <button :id="'close_edit_ingradient' + item.id" type="button"
                                                class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form :id="'edit_ingradient_form' + item.id">
                                                @csrf
                                                <div class="d-flex justify-content-center mt-1">
                                                    <input v-model="item.name" type="text" :id="'name' + item.id"
                                                        name="name" class="form-control w-75"
                                                        placeholder="Название ингредиента">
                                                </div>
                                                <div class="text-danger text-center mt-1 mb-3">
                                                    @{{ error_edit_name }}
                                                </div>
                                                <div class="d-flex justify-content-center mt-1">
                                                    <input v-model="item.gramm" type="text" :id="'gramm' + item.id"
                                                        name="gramm" class="form-control w-75" placeholder="Граммы">
                                                </div>
                                                <div class="text-danger text-center mt-1 mb-3">
                                                    @{{ error_edit_gramm }}
                                                </div>
                                                <div class="d-flex justify-content-center mt-1">
                                                    <input v-model="item.price" type="text" :id="'price' + item.id"
                                                        name="price" class="form-control w-75"
                                                        placeholder="Цена за порцию">

                                                </div>
                                                <div class="text-danger text-center mt-1 mb-3">
                                                    @{{ error_edit_price }}
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-primary text-white"
                                                        v-on:click="editingradient(ib)">Изменить</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Назад</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Модальное окно редактирования инградиентов в конструкторе чуду  в меню конец -->

                            <!-- Modal удаления ингредиентов в конструкторе чуду -->
                            <div class="modal fade" :id="'delete_ingradient' + item.id" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                            </h5>
                                            <button :id="'close_delete_ingradient' + item.id" type="button"
                                                class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 class="text-center">Вы действительно хотите удалить категорию?</h3>
                                            <div class="d-flex justify-content-center mt-3">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Назад</button>
                                                <button class="btn btn-danger ms-2"
                                                    v-on:click='deleteingradient(ib)'>Удалить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal удаления ингредиентов в конструкторе чуду конец -->

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- модальное окно при успешном редоктировании -->
    <button class="d-none" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modaledit"></button>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class=" py-3 text-center fs-1 px-3 lead text-success"><i class="bi bi-check2-circle"></i>
                    </div>
                    <div class=" text-center px-3 lead text-dark">Редактирование прошло успешно!</div>
                </div>
                <div class="modal-footer">
                    <a href="/" class="btn btn-secondary text-white">Перейти на главную</a>
                    <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal"
                        aria-label="Close">Остаться</button>
                </div>
            </div>
        </div>
    </div>
    <!--модальное окно при успешном редактировании конец -->



    <script src="/public/script.js"></script>
    <script src="/admin.js"></script>
    <script src="/const.js"></script>
</body>

</html>
