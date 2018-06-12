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
