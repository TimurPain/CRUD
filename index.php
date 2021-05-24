<!doctype html>
<html lang="ru">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
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
      <table class="table">
        <thead>
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
    </div>
  </body>
</html>