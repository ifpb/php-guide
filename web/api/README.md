# API

- [Hello World](#hello-world)
- [Ping API](#ping-api)

## Hello World
---

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