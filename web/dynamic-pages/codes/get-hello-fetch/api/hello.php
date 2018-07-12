<?php
  $name = $_GET['name'] ?? '';
  $result = [];
  $result['body'] = "Olá $name";

  header("Content-type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  echo json_encode($result);
?>