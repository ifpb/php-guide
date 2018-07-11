<?php
  require 'util.php';

  $info = $_GET['info'] ?? 'getTasks';
  $response = [];

  if($info == 'getTasks'){
    $response = getTasks();
  } else if($info == 'rmTask') {
    $remove = $_GET['remove'] ?? '-';
    $response = rmTask($remove);
  } else if($info == 'addTask') {
    $minute = $_GET['minute'] ?? '*';
    $hour = $_GET['hour'] ?? '*';
    $day = $_GET['day'] ?? '*';
    $month = $_GET['month'] ?? '*';
    $weekDay = $_GET['weekDay'] ?? '*';
    $task = $_GET['task'] ?? '*';
    $response = addTask($minute, $hour, $day, $month, $weekDay, $task);
  }

  // if(empty($response)) {
  //   $response = ["error" => "Unknown info"];
  //   http_response_code(500);
  // }

  header("Content-type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  echo json_encode($response);
