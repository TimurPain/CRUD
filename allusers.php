<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <title>Все пользователи</title>
</head>
<body>

<?php require_once 'process2.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <h1>Все зарегистрированные пользователи сайта</h1>
        <table class="table">
            <thead>
                <tr>
                    <td><td><h3>Логин</h3></td></td>
                    <td><td><h3>Сообщение</h3></td></td>
                </tr>
            </thead>
            <?php
                $users = getAllUsers();
                //print_r($users);
                for ($i = 0; $i < count($users); $i++){
                    echo "<tr>";
                    echo "<td><td><b>".$users[$i]["login"]."</b></td></td>";
                    echo "<td><td>";
                    echo "<a href='smessages.php?to=".$users[$i]["id"]."' title='Отправить сообщение'>Написать сообщение</a>";
                    echo "</td></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
</body>
</html>