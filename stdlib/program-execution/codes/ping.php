<?php

  // get host
  $host = $_GET['host'] ?? null;

  // create json
  $json = '';
  if($host){
    $command = "ping -c1 {$host}";
    $result = shell_exec($command);
    $json = json_encode(['result' => $result]);
  } else {
    $json = json_encode(['error' => 'host not found']);
  }

  // echo json
  header('Content-type: application/json; charset=UTF-8');
  echo $json;

?>