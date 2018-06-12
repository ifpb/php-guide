<?php
	$times = $_COOKIE['count'] ?? 0;

	$times++;

	if(isset($_GET['zerar'])){
		$times = 0;
		setcookie('count', false);
	}else{
		setcookie('count', $times, time()+60*60*24);
	}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>A quantidade de vezes que vc acessou esta página é <?php echo $times ?></p>
	<a href="counter-cookie.php?zerar=true">zerar</a>
	<a href="counter-cookie.php">+1</a>
</body>
</html>
