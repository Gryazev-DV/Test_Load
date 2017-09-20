<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
  	File <input type="file" name="myfile"> 
  	<input type="submit" value="SEND">
  	<a href="list.php">
  	  <input type="button" value="Перейти к выбору тестов">
  	</a>
  </form>
	
</body>
</html>


<?php

$extension = 'json';
$maxSize = 100000;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if( isset($_FILES['myfile']['name']) && !empty($_FILES['myfile']['name']) ) {
		if ($_FILES['myfile']['size'] > $maxSize) {
			echo 'Файл больше допустимого размера 100кБ';
		} else {
			$ext = strtolower( pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION) );
			if ($ext === $extension) {
				if ($_FILES['myfile']['error'] == UPLOAD_ERROR_OK && move_uploaded_file($_FILES['myfile']['tmp_name'], 'Tests/' . $_FILES['myfile']['name']) ) {
					echo 'Файл загружен';
				} else {
					echo 'Произошла ошибка при загрузке ';
				}
			} else {
				echo 'Недопустимое расширение файла';
			}
		}
	}
}

