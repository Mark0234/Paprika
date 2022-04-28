const Main = {
    data() {
        return {
            card: JSON.parse(localStorage.getItem("test")), //Получаем данные из локального хранилища
        };
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
        },
        delcard(ib) {
            var prom = this.card;
            prom.splice(ib, 1);
            localStorage.setItem("test", JSON.stringify(prom));
        },
        plus(id) {
            prom = this.card;
            this.card.forEach(function (elem) {
                if (elem.id == id) {
                    elem.colvo = elem.colvo + 1;
                    localStorage.setItem("test", JSON.stringify(prom));
                }
            });
        },
        minus(id) {
            prom = this.card;
            this.card.forEach(function (elem) {
                if (elem.id == id) {
                    elem.colvo = elem.colvo - 1;
                    localStorage.setItem("test", JSON.stringify(prom));
                }
            });
        },
    },
};
Vue.createApp(Main).mount("#main");
