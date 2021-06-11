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
      $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>
        
     <div>

      <table class="table">
        <thead>

          <tr>
            <th><p><h5>Добавить пользователя<a href="add.php" style="color: black">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg></a></h5></p></th>
            <th></th>
            <th><a href="summernote/summernote.php" class="btn btn-outline-warning">Заметки</a> <a href="/exit.php" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg> Выйти</a></th>
          </tr>

          <tr bgcolor="black">
            <th><h2 style="color:white">Работники</h2></th>
            <form method="post" action="crud.php">
            <th><h4 style="color:white">Поиск</h4><input type="text" name="search" class="form-control" placeholder="Поиск..." id=""></th>
            <th><input type="submit" name="submit" value="Найти" class="btn btn-primary"></th>
            </form>
          </tr>

          <tr>
            <th>Name</th>
            <th>Location</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

          <?php
          if (isset($_POST['search'])) {
              echo "Результат поиска:";
              $search = htmlspecialchars($_POST['search']);
              $result = $mysqli->query("SELECT * FROM data WHERE `id` LIKE '%$search%' OR `name` LIKE '%$search%' OR `location` LIKE '%$search%'");
              if ($result) {
                  while ($row = $result->fetch_assoc()):
                      echo "<tr>
                      <td>$row[name]</td>
                  <td>$row[location]</td>
                      <td>
                     <a href=\"crud.php?edit=$row[id]\"
                      class=\"btn btn-info\">Edit</a>
                 <a href=\"crud.php?delete=$row[id]\"
                      class=\"btn btn-danger\">Delete</a>
                   </td>
                  </tr>";
                  endwhile;
              }
          } else {
              while ($row = $result->fetch_assoc()):
                  echo "<tr>
          <td>$row[name]</td>
          <td>$row[location]</td>
          <td>
            <a href=\"crud.php?edit=$row[id]\"
              class=\"btn btn-info\">Edit</a>
            <a href=\"crud.php?delete=$row[id]\"
              class=\"btn btn-danger\">Delete</a>
          </td>
        </tr>";
              endwhile;
          }

          ?>
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
    <script>
    window.replainSettings = { id: '6f027284-e11a-40ca-be29-94f4f9b3eded' };
    (function(u){var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=u;
    var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
    })('https://widget.replain.cc/dist/client.js');
    </script>
  </body>
</html>