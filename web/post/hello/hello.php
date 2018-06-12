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
