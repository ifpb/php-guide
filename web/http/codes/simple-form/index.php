<?php
$dias = ["Segunda", "Terça", "Quarta", "Quinta", "Sexta"];
$cursos = [
  "TSI" => "Sistemas para Internet",
  "RC" => "Redes de Computadores"
];
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Simple Form</title>
  <style>
    body {
      color: #606c71;
    }
  </style>
</head>

<body>
  <div class="container mt-4">
    <h1>Contato</h1>
    <form action="review.php" method="post" class="mt-4">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required autofocus>
      </div>
      <div class="form-group">
        Sexo
        <div>
          <input type="radio" name="sexo" id="masculino" value="Masculino" checked>
          <label for="masculino" class="pr-1">Masculino</label>
          <input type="radio" name="sexo" id="feminino" value="Feminino">
          <label for="feminino">Feminino</label>
        </div>
      </div>
      <div class="form-group">
        Estou no IFPB:
        <div>
          <?php
          $inputs = "";
          foreach ($dias as $dia) {
            $inputs .= "<input type=\"checkbox\" name=\"dias[]\" id=\"${dia}\" value=\"${dia}\">
            <label for=\"${dia}\" class=\"pr-3\">${dia}</label>";
          }
          echo $inputs;
          ?>
        </div>
      </div>
      <div class="form-group">
        <label for="curso">Curso</label>
        <select name="curso" class="form-control" id="curso">
          <option value="" selected>escolha um curso</option>
          <?php
          $options = "";
          foreach ($cursos as $sigla => $curso) {
            $options .= "<option value=\"${sigla}\">${curso}</option>";
          }
          echo $options;
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
      </div>
      <div class="form-group">
        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" class="form-control" name="mensagem"></textarea>
      </div>
      <input type="submit" value="Enviar">
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>