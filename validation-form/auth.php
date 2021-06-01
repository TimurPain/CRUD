<?php
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);

$pass = md5($pass."hvwlf2985");

$DB_HOST  = "localhost";
$DB_NAME  = "register-bd";
$DB_LOGIN  = "mysql";
$DB_PASSWORD  = "mysql";

$mysql = new mysqli($DB_HOST, $DB_LOGIN, $DB_PASSWORD, $DB_NAME) or die(mysqli_error($mysqli));
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch_assoc();
if(($user) == 0){
    echo "Такой пользователь не найден";
    exit;
}

setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

header('Location: /crud.php');