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
