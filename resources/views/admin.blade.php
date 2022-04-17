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
</head>

<body>
    <div class="main">
        <div class="display-4 text-center mt-3">
            Панель управления
        </div>
        <div class="text-center">
            <a href="/login" class="mt-3 btn btn-lg btn-light fs-6" type="submit"><i class="bi bi-arrow-left-circle"></i>
                Выйти из панели управления</a>
        </div>

        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 mt-3">
                <div class="col">
                    <div class="main bg-light p-2 p-lg-4 m-5">
                        <form action="/main" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h2 class="text-center">Главная</h2>
                            <div class="d-flex justify-content-center">Логотип компании</div>
                            <div class="d-flex justify-content-center mt-1">
                                <input type="file" name="img_main" class="form-control w-50"
                                    placeholder="Логотип компании">
                            </div>
                            <div class="d-flex justify-content-center mt-1">
                                <input type="text" name="name_main" class="form-control w-50"
                                    placeholder="Наз.компании">
                            </div>
                            <div class="d-flex justify-content-center mt-1">
                                <button class="btn btn-info w-50">Добавить</button>
                            </div>

                        </form>
                    </div>

                </div>
                <div class="col">
                    22
                </div>
            </div>
        </div>

    </div>
    <script src="/public/script.js"></script>
</body>

</html>
