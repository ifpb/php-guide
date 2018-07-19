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
      $processes[] = [
        "user"    => $matches[1][$index],
        "pid"     => $matches[2][$index],
        "cpu"     => $matches[3][$index],
        "mem"     => $matches[4][$index],
        "vsz"     => $matches[5][$index],
        "rss"     => $matches[6][$index],
        "tty"     => $matches[7][$index],
        "stat"    => $matches[8][$index],
        "start"   => $matches[9][$index],
        "time"    => $matches[10][$index],
        "command" => $matches[11][$index],
      ];
    }

    return $processes;
  }

  ps();
?>