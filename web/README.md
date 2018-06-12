# PHP Web

- [HTTP Methods](#http-methods)
  - [$_GET](#_get)
  - [$_POST](#_post)
- [Cookie](#cookie)
  - [$_COOKIE](#_cookie)
- [Session](#session)
  - [$_SESSION](#_session)
  - [Auth](#auth)
- [Layout](#layout)
- [API](#api)
  - [Hello World](#hello-world)
  - [Ping API](#ping-api)

## References
---
- [Manual do php.net](http://php.net/manual/en/)
  - [Features](http://php.net/manual/en/features.php)

## HTTP Methods
---
### $_GET
Reference: [$_GET](http://php.net/manual/en/reserved.variables.get.php), [Predefined Variables](http://php.net/manual/en/reserved.variables.php)

[get/hello/index.html](get/hello/index.html)
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="hello.php">
    <input type="text" name="name">
    <input type="submit" value="Olá...">
  </form>
</body>
</html>
```

[get/hello/hello.php](get/hello/hello.php)
```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <div class="">
    <?php
      $name = $_GET['name'] ?? '';
      echo "Olá $name";
    ?>
  </div>
</body>
</html>
```

[get/hello/hello.php?name=Luiz](get/hello/hello.php?name=Luiz)

### $_POST
Reference: [$_POST](http://php.net/manual/en/reserved.variables.post.php), [Predefined Variables](http://php.net/manual/en/reserved.variables.php)

[post/hello/index.html](post/hello/index.html)
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="hello.php" method="post">
    <input type="text" name="name">
    <input type="submit" value="Olá...">
  </form>
</body>
</html>
```

[post/hello/hello.php](post/hello/hello.php)
```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <div class="">
    <?php
      $name = $_POST['name'] ?? '';
      echo "Olá $name";
    ?>
  </div>
</body>
</html>
```

[post/hello-compact/index.php](post/hello-compact/index.php)
```php
<?php
  $name = $_POST['name'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="name">
    <input type="submit" value="Olá...">
  </form>
  <?php if($name){ ?>
    <div>
      <?php echo "Olá $name"; ?>
    </div>
  <?php } ?>
</body>
</html>
```

<!-- 
TODO
### $_FILES 
upload
-->
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

## Layout
---

[layout/index.php](layout/index.php)
```php
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
```

## API
---

### Hello World

[api/hello/index.hello](api/hello/index.hello)
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form id="hello-form">
    <input type="text" name="name">
    <input type="submit" value="Olá...">
  </form>
  <div id="hello"></div>
  <script>
    const form = new FormData(document.querySelector('#hello-form'));
    const helloField = document.querySelector('div#hello');

    helloButton.addEventListener('click', helloWorld);

    function helloWorld(event){
      let name = nameField.value;
      let url = `hello.php?name=${name}`;

      fetch(url, {
        method: "POST",
        body: form
      })
      .then(function(res) {return res.text()})
      .then(function(responseText) {
        helloField.innerHTML = responseText;
      })

      event.preventDefault();
    }

  </script>
</body>
</html>
```

[api/hello/hello.php](api/hello/hello.php)
```php
<?php
  $name = $_GET['name'] ?? '';
  echo "Olá $name";
?>
```

[api/hello/hello.php?name=Luiz](api/hello/hello.php?name=Luiz)

### Ping API

- [api/ping-api/public/index.html](api/ping-api/public/index.html)
- [api/ping-api/v1/ping.php?host=8.8.8.8](api/ping-api/v1/ping.php?host=8.8.8.8)
- [api/ping-api/v1/ping.php?host=8.8.8.8&count=2](api/ping-api/v1/ping.php?host=8.8.8.8&count=2)