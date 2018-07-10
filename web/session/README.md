# PHP Session

- [Cookie](#cookie)
  - [$_COOKIE](#_cookie)
- [Session](#session)
  - [$_SESSION](#_session)
  - [Auth](#auth)

## Cookie
---

### $_COOKIE

Reference: [Cookies](http://php.net/manual/en/features.cookies.php), [$_COOKIE](http://php.net/manual/en/reserved.variables.cookies.php), [setcookie()](http://php.net/manual/en/function.setcookie.php)

[Cookie](http://php.net/manual/en/features.cookies.php): name, value, expire, path, domain, secure, httponly
[setcookie()](http://php.net/manual/en/function.setcookie.php)

[cookie/counter-cookie.php](cookie/counter-cookie.php)
```php
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
```

## Session
---

### $_SESSION

[session/counter-session.php](session/counter-session.php)
```php
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
```

### Auth

- [session/auth/login.html](session/auth/login.html)
- [session/auth/home.php](session/auth/home.php)