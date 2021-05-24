<?php 

$id = 0;
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$location = filter_var(trim($_POST['location']),
FILTER_SANITIZE_STRING);
$update = false;
$DB_HOST  = "localhost";
$DB_NAME  = "crud";
$DB_LOGIN  = "mysql";
$DB_PASSWORD  = "mysql";

$mysqli = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD, $DB_NAME) or die(mysqli_error($mysqli));
//SAVE
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

    header('location: index.php');
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

    header('location: index.php');
}
?>