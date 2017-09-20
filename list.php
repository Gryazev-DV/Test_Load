<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		* {
		  margin: 20px;
		}
	</style>
</head>
<body>

  <h1>Выберите тест</h1>

  <?php
    $list = glob('Tests/*');

   
 

	?>
  
  <form action="test.php">
    <label for="test-number"> Выберите номер теста </label>
    <select name="testNumber" id="testNumber" size="10">
    	<? foreach($list as $id => $file): 
          $name = basename($file); ?>
          <option value="<?= $name ?>"> Тест №<?=++$id?> </option>;
      <? endforeach ?>
    </select>

 
    <input type="submit" value="Send">  
  </form>

	<a href="admin.php">
		<input type="button" value="вернуться к загрузке файлов">
	</a>
</body>
</html>