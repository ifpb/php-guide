<?php
  $heroes = [
    [
      "name" => "Bruce Wayne",
      "hero" => "Batman",
      "city" => "Gothan City"
    ],
    [
      "name" => "Peter Parker",
      "hero" => "Homem Aranha",
      "city" => "New York"
    ],
    [
      "name" => "Clark Kent",
      "hero" => "Super Homem",
      "city" => "Metropolis"
    ]
  ]; 
?>
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
          <?php foreach ($hero as $name => $field): ?>
            <?php if ($name == 'hero'): ?>
              <td> <a href="http://www.google.com.br/#q=<?=$field?>"><?=$field?></a></td>
            <?php else: ?>
              <td><?=$field?></td>
            <?php endif ?>
          <?php endforeach ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>