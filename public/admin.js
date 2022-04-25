//Константа Главная
const Main_home = {
    data() {
        return {};
    },
    beforeMount() {
        this.main_home();
    },
    methods: {
        main_home() {
            $.ajax({
                type: "GET",
                url: "/main_home",
                method: "get",
                dataType: "json",
                success: function (data) {
                    document.getElementById("name").value = `${data["name"]}`;
                    document.getElementById(
                        "slogan"
                    ).value = `${data["slogan"]}`;
                    document.getElementById(
                        "description"
                    ).value = `${data["description"]}`;
                    document.getElementById(
                        "servis_a"
                    ).value = `${data["servis_a"]}`;
                    document.getElementById(
                        "servis_b"
                    ).value = `${data["servis_b"]}`;
                    document.getElementById(
                        "servis_c"
                    ).value = `${data["servis_c"]}`;
                },
            });
        },
        edit_main_home() {
            event.preventDefault();
            var main_home_edit = new FormData($("#main_home_edit")[0]);
            $.ajax({
                type: "POST",
                url: "/main_home_edit",
                cache: false,
                contentType: false,
                processData: false,
                data: main_home_edit,
                success: function (data) {
                    modaledit.click();
                },
            });
        },
    },
};
Vue.createApp(Main_home).mount("#main_home");
//Меню
const Main_menu = {
    data() {
        return {
            category: [],
            card: [],
            add_name: "",
            error_add_name: "",
            error_edit_name: "",
            add_card_img: "",
            error_add_card_img: "",
            error_edit_card_img: "",
            add_card_name: "",
            error_add_card_name: "",
            error_edit_card_name: "",
            add_card_description: "",
            error_add_card_description: "",
            error_edit_card_description: "",
            add_card_price: "",
            error_add_card_price: "",
            error_edit_card_price: "",
        };
    },
    beforeMount() {
        this.category_all();
        this.category_card_all();
    },
    methods: {
        //Добавление в базу
        addСategory() {
            event.preventDefault();
            var addformСategor = new FormData($("#addformСategory")[0]);
            var prom = this.category;
            if (this.add_name != "") {
                $.ajax({
                    type: "POST",
                    url: "/add_category",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: addformСategor,
                    success: function (data) {
                        close_add_category.click();
                        prom.push({
                            id: data["id"],
                            name: data["name"],
                        });
                    },
                });
                addformСategory.reset(); //удаляет содержимое и обновляет форму
            } else {
                this.error_add_name = "Поле обязательно";
            }
        },
        //редактирование через ajax
        editСategory(ib) {
            event.preventDefault(); // Запрещает обновляться странице . только для формы
            var editformСategory = new FormData($("#editformСategory")[0]);
            var prom = this.category;
            var e_item = prom[ib];
            if (e_item.name != "") {
                $.ajax({
                    type: "POST",
                    url: `/edit_category/${e_item.id}`,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: editformСategory,
                    success: function (data) {
                        close_edit_category.click();
                    },
                });
            } else {
                this.error_edit_name = "Поле обязательно";
            }
        },
        //Удаление через ajax
        deleteСategory(ib) {
            var prom = this.category;
            var e_item = prom[ib];

            $.ajax({
                type: "GET",
                url: `/delete_category/${e_item.id}`,
                method: "get",
                cache: false,
                contentType: false,
                processData: false,
                data: editformСategory,
                success: function (data) {
                    document
                        .getElementById(`close_delete_category${e_item.id}`)
                        .click();
                    prom.splice(ib, 1);
                },
            });
        },
        //добовление карточки в категорию
        addСategory_card(ib) {
            event.preventDefault();
            var prom = this.card;
            var c_prom = this.category;
            var e_item = c_prom[ib];
            var addformCategory_card = new FormData(
                $(`#addformCategory_card${e_item.id}`)[0]
            );
            if (
                document.getElementById(`add_card_img${e_item.id}`).files
                    .length != 0
            ) {
                if (this.add_card_name != "") {
                    if (this.add_card_description != "") {
                        if (this.add_card_price != "") {
                            $.ajax({
                                type: "POST",
                                url: `/add_category_card/${e_item.id}`,
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: addformCategory_card,
                                success: function (data) {
                                    document
                                        .getElementById(
                                            `close_add_card${e_item.id}`
                                        )
                                        .click();
                                    prom.push({
                                        id: data["id"],
                                        type: data["type"],
                                        img: data["img"],
                                        name: data["name"],
                                        description: data["description"],
                                        price: data["price"],
                                    });
                                },
                            });
                            document
                                .getElementById(
                                    `addformCategory_card${e_item.id}`
                                )
                                .reset();
                        } else {
                            this.error_add_card_price = "Поле обязательно";
                            this.error_add_card_description = "";
                            this.error_add_card_name = "";
                            this.error_add_card_img = "";
                        }
                    } else {
                        this.error_add_card_description = "Поле обязательно";
                        this.error_add_card_name = "";
                        this.error_add_card_img = "";
                    }
                } else {
                    this.error_add_card_name = "Поле обязательно";
                    this.error_add_card_img = "";
                }
            } else {
                this.error_add_card_img = "Поле обязательно";
            }
        },
        //Вывод категории
        category_all() {
            var prom = this.category;
            $.ajax({
                type: "GET",
                url: "/menu_category",
                method: "get",
                dataType: "json",
                success: function (data) {
                    data.forEach(function (elem) {
                        prom.push({
                            id: elem["id"],
                            name: elem["name"],
                        });
                    });
                },
            });
        },
        //Вывод карточек в категории
        category_card_all() {
            var prom = this.card;
            $.ajax({
                type: "GET",
                url: "/menu_category_card",
                method: "get",
                dataType: "json",
                success: function (data) {
                    data.forEach(function (elem) {
                        prom.push({
                            id: elem["id"],
                            type: elem["type"],
                            img: elem["img"],
                            name: elem["name"],
                            description: elem["description"],
                            price: elem["price"],
                        });
                    });
                },
            });
        },

        //редактирование карточек через ajax
        editСategory_card(sas) {
            event.preventDefault(); // Запрещает обновляться странице . только для формы
            this.card.forEach(function (e_item) {
                if (e_item.id == sas) {
                    var editformCategory_card = new FormData(
                        $(`#editformCategory_card${e_item.id}`)[0]
                    );
                    if (e_item.name != "") {
                        if (e_item.description != "") {
                            if (e_item.price != "") {
                                $.ajax({
                                    type: "POST",
                                    url: `/edit_category_card/${e_item.id}`,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: editformCategory_card,
                                    success: function (data) {
                                        document
                                            .getElementById(
                                                `close_edit_card${e_item.id}`
                                            )
                                            .click();
                                        e_item.img = data;
                                    },
                                });
                            } else {
                                this.error_edit_price = "Поле обязательно";
                            }
                        } else {
                            this.error_edit_description = "Поле обязательно";
                        }
                    } else {
                        this.error_edit_name = "Поле обязательно";
                    }
                }
            });
        },

        deleteСategorycard(sas) {
            cards = this.card;
            this.card.forEach(function (e_item, $key) {
                if (e_item.id == sas) {
                    var prom = e_item.id;
                    $.ajax({
                        type: "GET",
                        url: `/delete_category_card/${e_item.id}`,
                        method: "get",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            cards.splice($key, 1);
                            document
                                .getElementById(`closedeletecard${e_item.id}`)
                                .click();
                        },
                    });
                }
            });
        },
    },
};
Vue.createApp(Main_menu).mount("#main_menu");
