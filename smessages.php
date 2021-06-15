<?php
require_once 'process2.php';
session_start();
$user = getUserOnID($_GET["to2"]);
if(isset($_POST["smessage"])){
    $message = $_POST["message"];
    $to2 = $_POST["to2"];
    $from2 = getIDOnLogin($_SESSION["login"]);
    addMessage($from2, $to2, $message);
}
?>
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
<div class="container mt-4">
    <div class="row justify-content-center">
        <form id = "form1" action="smessages.php?to=<?php echo $_GET["to2"]; ?>" method = "post">
            <p>
            <h1>Отправить сообщение пользователю <?php echo $user["login"]; ?></h1>
            <br />
            <label>Ваше сообщение</label>
            <br /> 
            <textarea name="message" cols="40" rows="10"></textarea>
            </p>
            <p>
            <input type="hidden" name="to2" value="<?php echo $_GET["to2"]; ?>"  />
            <input type="submit" class="btn btn-primary" name="smessage" value="Отправить"  />
            </p>
        </form>
    </div>
</div>
</body>
</html>