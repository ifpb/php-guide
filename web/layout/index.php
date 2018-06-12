<?php
	$page = $_GET['page'] ?? "page1";
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<nav><a href="index.php?page=page1">pagina 1</a><a href="index.php?page=page2">pagina 2</a></nav>
	<div>
		<?php 
			include($page.".php"); 
		?>
	</div>
</body>
</html>