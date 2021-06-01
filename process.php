<?php 
$id = 0;
$name = "";
$location = "";
$update = false;
$DB_HOST  = "localhost";
$DB_NAME  = "crud";
$DB_LOGIN  = "mysql";
$DB_PASSWORD  = "mysql";

$mysqli = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD, $DB_NAME) or die(mysqli_error($mysqli));
//SECURITY
if(isset($_POST['name']) && isset($_POST['location']) && isset($_POST['search'])) {
    $name = str_replace("'", '', htmlspecialchars($_POST['name']));
    $location = str_replace("'", '', htmlspecialchars($_POST["location"]));
    $search = str_replace("'", '', htmlspecialchars($_POST["search"]));
}
//SAVE
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

    header('location: crud.php');
}
//DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
}
//EDIT
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if ($result == 1) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    }
}
//UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error);

    header('location: crud.php');
}

