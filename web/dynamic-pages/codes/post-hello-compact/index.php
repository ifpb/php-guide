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
