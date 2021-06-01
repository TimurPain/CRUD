<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h1>Форма авторизации</h1>
                    <form action="validation-form/auth.php" method="post">
                        <input type="text" name="login" id="login" class="form-control" placeholder="Введите логин"><br>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Введите пароль"><br>
                        <button class="btn btn-success" type="submit">Авторизоваться</button>
                        <input type="button" onclick="history.back();" class="btn btn-dark" name="back" value="Back"/>
                    </form>
                </div>
            </div>
    </div>
</body>
</html>