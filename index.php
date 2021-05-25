<!doctype html>
<html lang="ru">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>CRUD</title>
  </head>

  <body>

    <?php require_once 'process.php'; ?>

    <?php
    
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

  <div class="container">
    <?php
      $mysqli = new mysqli('localhost', 'mysql', 'mysql', 'crud') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>
        
     <div>
          <p><h5>Добавить пользователя<a href="add.php" style="color: black">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
          </svg></a></h5></p>
      <table class="table">
        <thead>
          <tr>
            <th><h2>Работники</h2></th>
            <th><h4>Поиск</h4><input type="text" name="" value="" class="form-control" placeholder="Поиск..."></th>
            <th><button type="sumbit" class="btn btn-primary" name="search">-></button></th>
          </tr>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

      <?php
        while ($row = $result->fetch_assoc()):
      ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>"
              class="btn btn-info">Edit</a>
            <a href="index.php?delete=<?php echo $row['id']; ?>"
              class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
      </table>
     </div>

    <?php
      function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
      }    
    ?>

    <div class="row justify-content-center">
    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
        </div>
        <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" value="<?php echo $location; ?>" class="form-control" placeholder="Enter your location">
        </div>
        <div class="form-group">
        <?php
        if ($update == true):
        ?>
        <button type="sumbit" class="btn btn-primary" name="update">Update</button>
        <?php else: ?>
        <button type="sumbit" class="btn btn-primary" name="save">Save</button>
        <?php endif; ?>
        </div>
    </form>
    </div>
  </body>
</html>