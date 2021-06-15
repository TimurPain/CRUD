<?php
//ALL USERS AND LOCAL MESSAGES
function connectDB(){
    return new mysqli("localhost", "mysql", "mysql", "register-bd");
}
function closeDB($mysqli){
    $mysqli->close();
}
function getAllUsers(){
    $mysqli = connectDB();
    $result_set = $mysqli->query("SELECT * FROM users WHERE activation=''");
    closeDB($mysqli);
    return resultToArray($result_set);
}
function resultToArray($result_set){
    $results = array();
    while (($row = $result_set->fetch_assoc()) != false){
        $results[] = $row;
    }
    return $results;
}
function getUserOnID($id){
    $mysqli = connectDB();
    $result_set = $mysqli->query("SELECT * FROM `users` WHERE `id`='$id'");
    closeDB($mysqli);
    return $result_set->fetch_assoc();
}
function getIDOnLogin($login){
    $mysqli = connectDB();
    $result_set = $mysqli->query("SELECT `id` FROM `users` WHERE `login`='$login'");
    $row = $result_set->fetch_assoc();
    closeDB($mysqli);
    return $row["id"];
}
function addMessage($from2, $to2, $message){
    $mysqli = connectDB();
    $mysqli->query("INSERT INTO `messages` (`from2`, `to2`, `message`) VALUES ('$from2', '$to2', '$message')");
    closeDB($mysqli);
}
function getAllMessages($to2){
    $mysqli = connectDB();
    $result_set = $mysqli->query("SELECT * FROM `message` WHERE `to2` = '$to2'");
    closeDB($mysqli);
    return resultToArray($result_set);
}