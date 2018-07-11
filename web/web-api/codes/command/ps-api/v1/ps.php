<?php
  function ps() {
    $result = shell_exec("ps aux");
    $ps = ps_encode($result);
    
    header("Content-type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($ps);
  }

  function ps_encode($result) {
    $processes = [];

    $regex = "/\n([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+(.+)/";
    preg_match_all($regex, $result, $matches);

    foreach ($matches[1] as $index => $user) {
      $process = [];
      $process["user"] = $matches[1][$index];
      $process["pid"] = $matches[2][$index];
      $process["cpu"] = $matches[3][$index];
      $process["mem"] = $matches[4][$index];
      $process["vsz"] = $matches[5][$index];
      $process["rss"] = $matches[6][$index];
      $process["tty"] = $matches[7][$index];
      $process["stat"] = $matches[8][$index];
      $process["start"] = $matches[9][$index];
      $process["time"] = $matches[10][$index];
      $process["command"] = $matches[11][$index];
      $processes[] = $process;
    }

    return $processes;
  }

  ps();
?>