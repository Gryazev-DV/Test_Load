<?php
error_reporting(E_ALL);
$list = glob('Tests/*');?>

<?php if (empty($list)) : 
echo 'ни одного теста не загружено'; ?>
<a href="admin.php">
<input type="button" value="вернуться к загрузке файлов">
</a> 
<?php exit; ?> 
<?php endif ?>
 

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
 
  <form action="test.php">
    <label> Выберите номер теста </label>
    <select name="testName" id="testName" size="10">
      <?php foreach($list as $id => $file): 
          $fileName = pathinfo($file, PATHINFO_FILENAME);
          $baseName = pathinfo($file, PATHINFO_BASENAME) ?>
          <option value="<?= $baseName ?>"> Тест <?= $fileName ?> </option>;
      <?php endforeach ?>
    </select>
    <input type="submit" value="Send">  
  </form>

  <a href="admin.php">
    <input type="button" value="вернуться к загрузке файлов">
  </a>
</body>
</html>