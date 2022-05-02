const Main = {
    data() {
        return {
            card: JSON.parse(localStorage.getItem("test")), //Получаем данные из локального хранилища
            ingradient_chudu: [],
            ingradient_pizza: [],
            testo: 0,
            colvo: 0,
            itogo: 0,
            error_name: "",
            error_tel: "",
            error_address: "",
            error_message: "",
            error_sposob: "",
            name: "",
            tel: "",
            address: "",
            message: "",
            sposob: "",
            product: "",
        };
    },
    beforeMount() {
        this.const_pizza_all();
        this.const_chudu_all();
        this.itogo_all();
    },
    methods: {
        addbasket(id) {
            var colvo = 0;
            if (this.card != null) {
                prom = this.card;
                this.card.forEach(function (elem) {
                    //если card есть в хранилище то срабатывает счетчик +1
                    if (elem.id == id) {
                        colvo = colvo + 1;
                        elem.colvo = elem.colvo + 1;
                        localStorage.setItem("test", JSON.stringify(prom));
                        document.getElementById(`card${id}`).innerHTML =
                            '<i class="bi bi-check-lg"></i> Добавлено';
                    }
                });
            } else {
                this.card = [];
                prom = this.card;
                colvo = colvo + 1;
                $.ajax({
                    type: "GET",
                    url: `/card_basket/${id}`,
                    method: "get",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        prom.push({
                            id: data["id"],
                            img: data["img"],
                            name: data["name"],
                            description: data["description"],
                            price: data["price"],
                            colvo: 1,
                        });
                        localStorage.setItem("test", JSON.stringify(prom)); //загружаем данные в локальное хранилище
                        document.getElementById(`card${id}`).innerHTML =
                            '<i class="bi bi-check-lg"></i> Добавлено';
                    },
                });
            }
            if (colvo == 0) {
                prom = this.card;
                $.ajax({
                    type: "GET",
                    url: `/card_basket/${id}`,
                    method: "get",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        prom.push({
                            id: data["id"],
                            img: data["img"],
                            name: data["name"],
                            description: data["description"],
                            price: data["price"],
                            colvo: 1,
                        });
                        localStorage.setItem("test", JSON.stringify(prom)); //загружаем данные в локальное хранилище
                        document.getElementById(`card${id}`).innerHTML =
                            '<i class="bi bi-check-lg"></i> Добавлено';
                    },
                });
            }
            setTimeout(() => {
                this.itogo_all();
            }, 400);
        },
        delcard(ib) {
            var prom = this.card;
            e_item = prom[ib];
            this.itogo =
                this.itogo - Number(e_item["colvo"]) * Number(e_item["price"]);
            prom.splice(ib, 1);
            localStorage.setItem("test", JSON.stringify(prom));
        },
        plus(id) {
            prom = this.card;
            var itogo = this.itogo;
            this.card.forEach(function (elem) {
                if (elem.id == id) {
                    elem.colvo = elem.colvo + 1;
                    itogo = itogo + Number(elem.price);
                    localStorage.setItem("test", JSON.stringify(prom));
                }
            });
            this.itogo = itogo;
        },
        minus(id) {
            prom = this.card;
            var itogo = this.itogo;
            this.card.forEach(function (elem) {
                if (elem.id == id) {
                    if (elem.colvo >= 2) {
                        elem.colvo = elem.colvo - 1;
                        itogo = itogo - Number(elem.price);
                        localStorage.setItem("test", JSON.stringify(prom));
                    }
                }
            });
            this.itogo = itogo;
        },
        const_chudu_all() {
            var prom = this.ingradient_chudu;
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
                            colvo: 0,
                        });
                    });
                },
            });
        },
        const_pizza_all() {
            var prom = this.ingradient_pizza;
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
                            colvo: 0,
                        });
                    });
                },
            });
        },
        testo() {
            this.colvo = this.colvo + this.testo;
        },
        //каунтер ++ pizza
        plus_ingridient(ib) {
            var prom = this.ingradient_pizza;
            var e_item = prom[ib];
            e_item.colvo = Number(e_item.colvo) + 1;
            this.colvo = Number(this.colvo) + Number(e_item.price);
        },
        // каунтер ++ chudu
        plus_ingridient_chudu(ib) {
            var prom = this.ingradient_chudu;
            var e_item = prom[ib];
            e_item.colvo = Number(e_item.colvo) + 1;
            this.colvo = Number(this.colvo) + Number(e_item.price);
        },
        //каунтер -- pizza
        minus_ingridient(ib) {
            var prom = this.ingradient_pizza;
            var e_item = prom[ib];
            if (e_item.colvo != 0) {
                e_item.colvo = Number(e_item.colvo) - 1;
                this.colvo = Number(this.colvo) - Number(e_item.price);
            }
        },

        //каунтер -- chudu
        minus_ingridient_chudu(ib) {
            var prom = this.ingradient_chudu;
            var e_item = prom[ib];
            if (e_item.colvo != 0) {
                e_item.colvo = Number(e_item.colvo) - 1;
                this.colvo = Number(this.colvo) - Number(e_item.price);
            }
        },
        //добавление в карзину пиццу собранную  в конструкторе
        add_basket_pizza() {
            prom = this.card;
            latest = this.card.slice(-1);
            if (latest.length != 0) {
                //если в корзине ничего нет то добавляет туда
                latest.forEach(function (elem) {
                    latestId = elem["id"] + 1;
                });
            } else {
                latestId = 1;
            }
            var sostav = "";
            this.ingradient_pizza.forEach(function (elem) {
                if (elem["colvo"] != 0) {
                    sostav = `${sostav}${elem["name"]}  ${
                        elem["gramm"] * elem["colvo"]
                    }гр ,  `;
                    this.colvo = this.colvo + elem["colvo"] * elem["price"];
                }
            });
            prom.push({
                id: latestId,
                img: "pizza2.png",
                name: "#ЯПицца",
                description: sostav,
                price: Number(this.colvo) + Number(this.testo),
                colvo: 1,
            });
            localStorage.setItem("test", JSON.stringify(prom));
            document.getElementById("pizza").innerHTML =
                '<i class="bi bi-check-lg"></i> Добавлено в корзину';
            setTimeout(() => {
                this.itogo_all();
            }, 400);
        },

        //добавление в карзину чуду собранную  в конструкторе
        add_basket_chudu() {
            prom = this.card;
            latest = this.card.slice(-1);
            if (latest.length != 0) {
                latest.forEach(function (elem) {
                    latestId = elem["id"] + 1;
                });
            } else {
                latestId = 1;
            }
            var sostav = "";
            this.ingradient_chudu.forEach(function (elem) {
                if (elem["colvo"] != 0) {
                    sostav = `${sostav}${elem["name"]}  ${
                        elem["gramm"] * elem["colvo"]
                    }гр ,  `;
                    this.colvo = this.colvo + elem["colvo"] * elem["price"];
                }
            });
            prom.push({
                id: latestId,
                img: "chudu111.jpg",
                name: "#ЯЧуду",
                description: sostav,
                price: Number(this.colvo) + Number(this.testo),
                colvo: 1,
            });
            localStorage.setItem("test", JSON.stringify(prom));
            document.getElementById("chudu").innerHTML =
                '<i class="bi bi-check-lg"></i> Добавлено в корзину';
            setTimeout(() => {
                this.itogo_all();
            }, 400);
        },
        itogo_all() {
            itogo = 0;
            product = this.product
            i = JSON.parse(localStorage.getItem("test"));
            if (i != null) {
                this.card.forEach(function (elem) {
                    itogo =
                        itogo + Number(elem["colvo"]) * Number(elem["price"]);
                    product = `${product}${elem.id}.${elem.colvo},`
                });
            }
            this.itogo = itogo;
            this.product = product;
        },
        arrange() {
            event.preventDefault();
            var prom = this.card;
            var add_arrange = new FormData($("#add_arrange")[0]);
            if (this.name != "") {
                if (this.tel != "") {
                    if (this.tel.length == 11) {
                        if (this.address != "") {
                            if (this.sposob != "") {
                                $.ajax({
                                    type: "POST",
                                    url: "/add_arrange",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: add_arrange,
                                    success: function (data) {
                                        document;
                                        close_arrange.click();
                                    },
                                });
                                document.getElementById("add_arrange").reset();
                            } else {
                                this.error_sposob = "Укажите способ оплаты";
                                this.error_tel = "";
                                this.error_name = "";
                                this.error_address = "";
                            }
                        } else {
                            this.error_address = "Введите адрес";
                            this.error_tel = "";
                            this.error_name = "";
                        }
                    } else {
                        this.error_tel = "Введите 11 символов";
                    }
                } else {
                    this.error_tel = "Укажите телефон";
                    this.error_name = "";
                }
            } else {
                this.error_name = "Укажите имя";
            }
        },
    },
};
Vue.createApp(Main).mount("#main");
