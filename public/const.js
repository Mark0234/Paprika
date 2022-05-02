const const_pizza = {
    data() {
        return {
            ingradient: [],
            add_name: "",
            error_add_name: "",
            error_edit_name: "",
            add_gramm: "",
            error_add_gramm: "",
            error_edit_gramm: "",
            add_price: "",
            error_add_price: "",
            error_edit_price: "",
        };
    },
    beforeMount() {
        this.const_pizza_all(); //связывание с const_pizza_all
    },
    methods: {
        //Добавление инградиентов в базу
        add_const_pizza() {
            event.preventDefault(); //запрещает обновление страницы
            var prom = this.ingradient;
            var const_pizza_form = new FormData($(`#const_pizza`)[0]);
            if (this.add_name != "") {
                if (this.add_gramm != "") {
                    if (this.add_price != "") {
                        $.ajax({
                            type: "POST",
                            url: `/add_const_pizza`,
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: const_pizza_form,
                            success: function (data) {
                                prom.push({
                                    id: data["id"],
                                    name: data["name"],
                                    gramm: data["gramm"],
                                    price: data["price"],
                                });
                            },
                        });
                        // document.getElementById(`const_pizza_form`).reset();
                    } else {
                        this.error_add_price = "Поле обязательно";
                        this.error_add_gramm = "";
                        this.error_add_name = "";
                    }
                } else {
                    this.error_add_gramm = "Поле обязательно";
                    this.error_add_name = "";
                }
            } else {
                this.error_add_name = "";
            }
        },
        //вывод в шаблон всех итградиентов
        const_pizza_all() {
            var prom = this.ingradient;
            $.ajax({
                type: "GET",
                url: "/const_pizza_all",
                method: "get",
                dataType: "json",
                success: function (data) {
                    data.forEach(function (elem) {
                        prom.push({
                            id: elem["id"],
                            name: elem["name"],
                            gramm: elem["gramm"],
                            price: elem["price"],
                        });
                    });
                },
            });
        },
        //Редактирование инградиентов в базу
        editingradient(ib) {
            event.preventDefault(); // Запрещает обновляться странице . только для формы
            var prom = this.ingradient;
            var e_item = prom[ib];
            var edit_ingradient_form = new FormData(
                $(`#edit_ingradient_form${e_item.id}`)[0]
            );
            if (e_item.name != "") {
                if (e_item.gramm != "") {
                    if (e_item.price != "") {
                        $.ajax({
                            type: "POST",
                            url: `/edit_const_pizza/${e_item.id}`,
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: edit_ingradient_form,
                            success: function (data) {
                                document
                                    .getElementById(
                                        `close_edit_ingradient${e_item.id}`
                                    )
                                    .click();
                            },
                        });
                    } else {
                        this.error_edit_price = "Поле обязательно";
                        this.error_edit_gramm = "";
                        this.error_edit_name = "";
                    }
                } else {
                    this.error_edit_gramm = "Поле обязательно";
                    this.error_edit_name = "";
                }
            } else {
                this.error_edit_name = "Поле обязательно";
            }
        },
        //удаление инградиентов
        deleteingradient(ib) {
            var prom = this.ingradient;
            var e_item = prom[ib];

            $.ajax({
                type: "GET",
                url: `/delete_ingradient/${e_item.id}`,
                method: "get",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    document
                        .getElementById(`close_delete_ingradient${e_item.id}`)
                        .click();
                    prom.splice(ib, 1); //splice- найди ииндекс ib и удалить запись с этим ииндексом
                },
            });
        },
    },
};
Vue.createApp(const_pizza).mount("#div_const_pizza");

//константа чуду
const const_chudu = {
    data() {
        return {
            ingradient: [],
            add_name: "",
            error_add_name: "",
            error_edit_name: "",
            add_gramm: "",
            error_add_gramm: "",
            error_edit_gramm: "",
            add_price: "",
            error_add_price: "",
            error_edit_price: "",
        };
    },
    beforeMount() {
        this.const_chudu_all(); //связывание с const_chudu_all
    },
    methods: {
        //Добавление инградиентов в базу
        add_const() {
            event.preventDefault(); //запрещает обновление страницы
            var prom = this.ingradient;
            var const_chudu = new FormData($(`#const_chudu`)[0]);
            if (this.add_name != "") {
                if (this.add_gramm != "") {
                    if (this.add_price != "") {
                        $.ajax({
                            type: "POST",
                            url: `/add_const_chudu`,
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: const_chudu,
                            success: function (data) {
                                prom.push({
                                    id: data["id"],
                                    name: data["name"],
                                    gramm: data["gramm"],
                                    price: data["price"],
                                });
                            },
                        });
                        // document.getElementById(`const_pizza_form`).reset();
                    } else {
                        this.error_add_price = "Поле обязательно";
                        this.error_add_gramm = "";
                        this.error_add_name = "";
                    }
                } else {
                    this.error_add_gramm = "Поле обязательно";
                    this.error_add_name = "";
                }
            } else {
                this.error_add_name = "";
            }
        },
        //вывод в шаблон всех итградиентов
        const_chudu_all() {
            var prom = this.ingradient;
            $.ajax({
                type: "GET",
                url: "/const_chudu_all",
                method: "get",
                dataType: "json",
                success: function (data) {
                    data.forEach(function (elem) {
                        prom.push({
                            id: elem["id"],
                            name: elem["name"],
                            gramm: elem["gramm"],
                            price: elem["price"],
                        });
                    });
                },
            });
        },
        //Редактирование инградиентов в базу
        editingradient(ib) {
            event.preventDefault(); // Запрещает обновляться странице . только для формы
            var prom = this.ingradient;
            var e_item = prom[ib];
            var edit_ingradient_form = new FormData(
                $(`#edit_ingradient_form${e_item.id}`)[0]
            );
            if (e_item.name != "") {
                if (e_item.gramm != "") {
                    if (e_item.price != "") {
                        $.ajax({
                            type: "POST",
                            url: `/edit_const_chudu/${e_item.id}`,
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: edit_ingradient_form,
                            success: function (data) {
                                document
                                    .getElementById(
                                        `close_edit_ingradient${e_item.id}`
                                    )
                                    .click();
                            },
                        });
                    } else {
                        this.error_edit_price = "Поле обязательно";
                        this.error_edit_gramm = "";
                        this.error_edit_name = "";
                    }
                } else {
                    this.error_edit_gramm = "Поле обязательно";
                    this.error_edit_name = "";
                }
            } else {
                this.error_edit_name = "Поле обязательно";
            }
        },
        //удаление инградиентов
        deleteingradient(ib) {
            var prom = this.ingradient;
            var e_item = prom[ib];

            $.ajax({
                type: "GET",
                url: `/delete_ingradient_chudu/${e_item.id}`,
                method: "get",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    document
                        .getElementById(`close_delete_ingradient${e_item.id}`)
                        .click();
                    prom.splice(ib, 1); //splice- найди ииндекс ib и удалить запись с этим ииндексом
                },
            });
        },
    },
};
Vue.createApp(const_chudu).mount("#div_const_chudu");
