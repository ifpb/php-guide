<?php

  // get host
  $host = $_GET['host'] ?? null;

  // create result
  $result = '';
  if($host){
    $command = "ping -c1 {$host}";
    $result = shell_exec($command);
  } else {
    $result = 'host not found';
  }

  // echo result
  echo $result;

?>