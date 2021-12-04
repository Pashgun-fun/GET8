<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>GET8</title>
</head>
<body>
<div class="d-flex align-items-center" style="height: 100vh;">
    <section class="col-md-6 offset-md-3 ">
        <div class="text-center mb-3 fs-1"> GET 8</div>
        <label class="mb-2 w-100 fs-4">
            Email <span class = "alert-danger alert-email fs-6"></span><br>
            <input type="text" class="form-control w-100 mx-auto input__email" placeholder="Введите почту">
        </label>
        <label class="mb-2 w-100 fs-4">
            Телефон <span class = "alert-danger alert-phone fs-6"></span><br>
            <input type="text" class="form-control w-100 mx-auto input__phone" placeholder="Введите номер телефона">
        </label>
        <label class="mb-4 w-100 fs-4">
            Имя <span class = "alert-danger alert-name fs-6"></span><br>
            <input type="text" class="form-control w-100 mx-auto input__name" placeholder="Введите имя">
        </label>
        <a class="btn btn-primary btn-lg col-md-4 offset-md-4 send__data">Отправить</a>
        <div class="alert alert-success col-md-4 offset-md-4 mt-2 text-center p-3 success__write"></div>
    </section>
</div>


<script type="text/javascript" src="/assets/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>