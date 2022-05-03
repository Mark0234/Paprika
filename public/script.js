document.addEventListener("DOMContentLoaded", function () {
    let phoneInputs = document.querySelectorAll("input[data-tel-input]");

    let getInputNumbersValue = function (input) {
        return input.value.replace(/\D/g, "");
    };

    let onPhoneInput = function (e) {
        let input = e.target,
            inputNumbersValue = getInputNumbersValue(input);
        formattedInputValue = "";
        selectionStart = input.selectionStart;

        if (!inputNumbersValue) {
            return (input.value = "");
        }

        if (input.value.length != selectionStart) {
            if (e.data && /\D/g.test(e.data)) {
                input.value = inputNumbersValue;
            }
            return;
        }

        if (["7", "8", "9"].indexOf(inputNumbersValue[0]) > -1) {
            // Russian phone number
            if (inputNumbersValue[0] == "9")
                inputNumbersValue = "7" + inputNumbersValue;
            let firstSymbols = inputNumbersValue[0] == 8 ? "+7" : "+7";
            formattedInputValue = firstSymbols + " ";
            if (inputNumbersValue > 1) {
                formattedInputValue += "(" + inputNumbersValue.substring(1, 4);
            }
            if (inputNumbersValue >= 12345) {
                formattedInputValue += ") " + inputNumbersValue.substring(4, 7);
            }
            if (inputNumbersValue >= 12345678) {
                formattedInputValue += "-" + inputNumbersValue.substring(7, 9);
            }
            if (inputNumbersValue >= 1234567891) {
                formattedInputValue += "-" + inputNumbersValue.substring(9, 11);
            }
        } else {
            // Not Russian phone number
            formattedInputValue = "+" + inputNumbersValue.substring(0, 16);
        }
        input.value = formattedInputValue;
    };

    let onPhoneKeyDown = function (e) {
        let input = e.target;
        if (e.keyCode == 8 && getInputNumbersValue(input).length == 1) {
            input.value = "";
        }
        if (e.keyCode == 8 && getInputNumbersValue(input).length == 9) {
        }
    };

    let onPhonePaste = function (e) {
        let pastedText = e.clipboardData || window.clipboardData;
        (input = e.target), (inputNumbersValue = getInputNumbersValue(input));

        if (pasted) {
            let pastedText = pasted.getData("Text");
            if (/\D/g.test(pastedText)) {
                input.value = inputNumbersValue;
            }
        }
    };

    for (i = 0; i < phoneInputs.length; i++) {
        let input = phoneInputs[i];
        input.addEventListener("input", onPhoneInput);
        input.addEventListener("keydown", onPhoneKeyDown);
        input.addEventListener("paste", onPhonePaste);
    }
});

function check() {
    var tel = document.getElementById("tel").value;
    if (tel != "") {
        if (tel.length < 18 || tel.length > 20) {
            var error = "Неверный формат номера телефона";
            document.getElementById("tell_mess").innerHTML = error;
            tell_mess.classList.remove("text-muted");
            tell_mess.classList.add("text-danger");
        } else {
            $.ajax({
                url: `/check_tel/${tel}`,
                method: "get",
                dataType: "html",
                success: function (data) {
                    document.getElementById("bar").innerHTML =
                        '<i class="bi bi-arrow-left-short"></i> ' + tel;
                    document.getElementById("bar").style = "display:block;";
                    if (data == 1) {
                        document.getElementById("header").innerHTML =
                            '<i class="bi bi-person"></i> Вход в личный кабинет';
                        document.getElementById("psw_show").style =
                            "display:block;";
                        document.getElementById("tel_show").style =
                            "display:none;";
                        document.getElementById("btn_go").style =
                            "display:none;";
                        document.getElementById("btn_login").style =
                            "display:block;";
                        document.getElementById("lable").innerHTML =
                            "Введите пароль";
                        lable.classList.remove("text-danger");
                        lable.classList.add("text-muted");
                    } else {
                        // удалить ниже кусок кода если надо зарегистрировать человека
                        var error = "Номер не зарегистрирован";
                        document.getElementById("tell_mess").innerHTML = error;
                        tell_mess.classList.remove("text-muted");
                        tell_mess.classList.add("text-danger");

                        // раскамитить reg если надо будет регистировать человека

                        // document.getElementById("header").innerHTML =
                        //     '<i class="bi bi-person"></i> Регистрация аккаунта';
                        // document.getElementById("lable").innerHTML =
                        //     "Придумайте пароль (не менее 8 сим.)";
                        // lable.classList.remove("text-danger");
                        // lable.classList.add("text-muted");
                        // document.getElementById("psw_show").style =
                        //     "display:block;";
                        // document.getElementById("psw_show_confirm").style =
                        //     "display:block;";
                        // document.getElementById("tel_show").style =
                        //     "display:none;";
                        // document.getElementById("btn_go").style =
                        //     "display:none;";
                        // document.getElementById("btn_reg").style =
                        //     "display:block;";
                    }
                },
            });
        }
    } else {
        var error = "Вы не указали телефон";
        document.getElementById("tell_mess").innerHTML = error;
        tell_mess.classList.remove("text-muted");
        tell_mess.classList.add("text-danger");
    }
}

function back() {
    document.getElementById("btn_go").style = "display:block;";
    document.getElementById("btn_login").style = "display:none;";
    document.getElementById("btn_reg").style = "display:none;";
    document.getElementById("tel_show").style = "display:block;";
    document.getElementById("psw_show").style = "display:none;";
    document.getElementById("bar").style = "display:none;";
    document.getElementById("psw_show_confirm").style = "display:none;";
    document.getElementById("header").innerHTML =
        '<i class="bi bi-person"></i> Вход или Регистрация';
}

function login() {
    var token = document.getElementsByName("_token")[0].value;
    var tel = document.getElementById("tel").value;
    var pass1 = document.getElementById("password_one").value;
    $.ajax({
        url: `/login`,
        method: "post",
        dataType: "html",
        data: {
            _token: token,
            tel: tel,
            password: pass1,
        },
        success: function (data) {
            if (data == 1) {
                window.location.href = "/admin";
            } else {
                var error = "Логин или пароль введены неверно!";
                document.getElementById("bar").style = "display:none;";
                document.getElementById("tell_mess").innerHTML = error;
                tell_mess.classList.remove("text-muted");
                tell_mess.classList.add("text-danger");
                document.getElementById("btn_go").style = "display:block;";
                document.getElementById("btn_login").style = "display:none;";
                document.getElementById("psw_show").style = "display:none;";
                document.getElementById("tel_show").style = "display:block;";
            }
        },
    });
}

// раскамитить reg если надо будет регистировать человека

// function reg() {
//     var token = document.getElementsByName("_token")[0].value;
//     var tel = document.getElementById("tel").value;
//     var pass1 = document.getElementById("password_one").value;
//     var pass2 = document.getElementById("password_two").value;
//     $.ajax({
//         url: `/register`,
//         method: "post",
//         dataType: "html",
//         data: {
//             _token: token,
//             tel: tel,
//             password: pass1,
//             password_confirmation: pass2,
//         },
//         success: function (data) {
//             if (data == 1) {
//                 window.location.href = "/admin";
//             } else {
//                 if (pass1 != pass2) {
//                     document.getElementById("lable").innerHTML =
//                         "Пароли не совпадают!";
//                     lable.classList.remove("text-muted");
//                     lable.classList.add("text-danger");
//                 }
//             }
//         },
//     });
// }

function show(btn, input) {
    btn = document.getElementById(btn);
    input = document.getElementById(input);

    if (input.getAttribute("type") === "password") {
        input.setAttribute("type", "text");
        btn.innerHTML = '<i class="bi bi-eye text-primary fs-5"></i>';
    } else {
        input.setAttribute("type", "password");
        btn.innerHTML = '<i class="bi bi-eye-slash text-primary fs-5"></i>';
    }
}
