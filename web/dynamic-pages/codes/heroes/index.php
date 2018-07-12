<?php $heroes = json_decode(file_get_contents("heroes.json"), true); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Herói</th>
        <th>Cidade</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($heroes as $hero): ?>
        <tr>
          <td><?php echo implode("</td><td>", $hero); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>