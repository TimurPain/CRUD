<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Summernote</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/summernote.css" rel="stylesheet">
  
    <link href="css/style.css" rel="stylesheet">
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="summernote/bootstrap.min.js"></script>
    
    <script src="summernote/summernote.js"></script>
    <script src="summernote/lang/summernote-ru-RU.js"></script>
    
    <script src="summernote/script.js"></script>
  </head>
  
  <body style="background: black; color: yellow">
	<header class="header">
	  <div class="container">
	    <h1 class="text-center text-uppercase">Summernote
	    <br /> 
	    <small class="text-center">Супер простой редактор</small></h1>
	   </div> 
	</header>
	
	<div class="content">
		<div class="container">
			<h1>Заметки</h1>
			<form action="add2.php" method="post">
			  <div class="form-group">
			   	<textarea class="form-control" name="text" id="text" placeholder="Введите данные"></textarea>
			  </div>
			  <p>Ctrl + S для сохранения заметки <input type="button" onclick="history.back();" class="btn btn-danger" name="back" value="Back" style="color: yellow"/></p>
			</form>
		</div> 
	</div>		   
  </body>  
</html>