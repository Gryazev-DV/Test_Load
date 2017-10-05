<?php

// error_reporting(E_ALL);
if (isset($_GET['testName'])) {
	$testName = $_GET['testName'];

	if (file_exists('Tests/' . $testName)) { 

	  $JSONfile = file_get_contents('Tests/' . $testName);
	  $tests = json_decode($JSONfile, true);
	} else {
			echo 'Такого теста нет' . PHP_EOL; ?>
			<a class="back" href="list.php">
			<input type="button" value="вернуться к выбору теста"> 
		  </a> <?php
			exit;
	  }
} else {
		echo 'Тест не выбран!!' . PHP_EOL; ?>
		
		<a class="back" href="list.php">
	  <input type="button" value="вернуться к выбору теста"> 
		</a> <?php
		exit;
  }

$count = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		body {
			width: 800px;
			margin-left: 100px;
		}
		ul {
			width: 100%;
			list-style-type: none;
		}
		li {
			border-bottom: 1px solid rgba(0,0,0,0.2);
		}
		.back {
			display: block;
      padding-top: 30px;
		}
	</style>
</head>
<body>
	<form action="" method="POST">
		<h3>Выберите правильные ответы</h3>
		<ul>
			<?php 
	    for ($i=0; $i < count($tests); $i++) : ?>
				<li> 
					<p>Вопрос №<?= $count++ . '. ' . $tests[$i]['question'] ?> </p>
					<p class="variants"> <?php foreach ($tests[$i]['answer'] as $key => $value) : ?>
						<input type="radio" name="ans<?=$i?>" value="<?=$key?>" required> <?= $value ?> <br>
					<?php endforeach ?>
					</p>
		  	</li>
			<?php endfor ?>
			<input type="submit" name="submit" value="Проверить"> 
	  </ul>  
  </form>

<?php
	
	$correct = 0;
	$wrong = 0;
	  
	for ($i=0; $i < count($tests); $i++) {
		// echo $_POST["ans$i"] . " - " . $tests[$i]['correct'] . "<br>" ;  - проверка
		if ( isset($_POST["ans$i"]) ) {
	   	if ( $_POST["ans$i"] == $tests[$i]['correct'] ) {
	      $correct++;
	   	} else {
		   	  $wrong++;
		 	  } 
		} 
	}

	if (isset($_POST['submit'])) {
	  echo 'Правильных ' . $correct . "<br>";
	  echo 'Неправильных ' . $wrong . "<br>";
	}
  
?>


	<a class="back" href="list.php">
		<input type="button" value="вернуться к выбору теста"> 
	</a>
</body>
</html>