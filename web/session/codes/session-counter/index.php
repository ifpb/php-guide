<?php
	session_start();

	$times = $_SESSION['count'] ?? 0;

	$times++;

	if(isset($_GET['zerar'])){
		$times = 0;
		$_SESSION['count'] = 0;
	}else{
		$_SESSION['count'] = $times;
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
	<a href="counter-session.php?zerar=true">zerar</a>
	<a href="counter-session.php">+1</a>
</body>
</html>
