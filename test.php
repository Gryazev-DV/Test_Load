<?php
$testNumber = $_GET['testNumber'];
$JSONfile = file_get_contents('Tests/' . $testNumber);
$tests = json_decode($JSONfile, true);
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
				<p class="variants"> <? foreach ($tests[$i]['answer'] as $key => $value) : ?>
					<input type="radio" name="ans<?=$i?>" value="<?=$key?>" required> <?= $value ?> <br>
				<? endforeach ?>
				</p>
	  	</li>
			<? endfor ?>
			<input type="submit" value="Проверить"> 
	  </ul>  
  </form>

	<?php
	
	$correct = 0;
	$wrong = 0;

	for ($i=0; $i < count($tests); $i++) {
		// echo $_POST["ans$i"] . " - " . $tests[$i]['correct'] . "<br>" ;  - проверка
		if ( $_POST["ans$i"] == $tests[$i]['correct'] ) {
	    $correct++;
		} else {
			$wrong++;
		}
	}

	echo 'Правильных ' . $correct . "<br>";
	echo 'Неправильных ' . $wrong . "<br>";

	?>


	<a class="back" href="list.php">
		<input type="button" value="вернуться к выбору теста"> 
	</a>
</body>
</html>

