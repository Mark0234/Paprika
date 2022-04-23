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

const Main_menu = {
    data() {
        return {
            category: [],
            add_name: "",
            error_add_name: "",
        };
    },
    beforeMount() {
        this.category_all();
    },
    methods: {
        //Добавление в базу
        addСategory() {
            event.preventDefault();
            var addformСategory = new FormData($("#addformСategory")[0]);
            var prom = this.category;
            if (this.add_name != "") {
                $.ajax({
                    type: "POST",
                    url: "/add_category",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: addformСategory,
                    success: function (data) {
                        close_add_category.click();
                        prom.push({
                            id: data["id"],
                            name: data["name"],
                        });
                    },
                });
            } else {
                this.error_add_name = "Поле обязательно";
            }
        },
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
    },
};
Vue.createApp(Main_menu).mount("#main_menu");
