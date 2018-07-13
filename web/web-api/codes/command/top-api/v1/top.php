<?php
  function top() {
    $result = shell_exec("top -n1 -b");
    $top = top_encode($result);
    
    header("Content-type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($top);
  }

  function top_encode($result) {
    $processes = [];

    $regex = "/\n(\s+)?(\d+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ ]+)\s+([^ \n]+)/";
    preg_match_all($regex, $result, $matches);

    foreach ($matches[2] as $index => $pid) {
      $processes[] = [
        "pid"     => $matches[2][$index],
        "user"    => $matches[3][$index],
        "pr"      => $matches[4][$index],
        "ni"      => $matches[5][$index],
        "virt"    => $matches[6][$index],
        "res"     => $matches[7][$index],
        "shr"     => $matches[8][$index],
        "s"       => $matches[9][$index],
        "cpu"     => $matches[10][$index],
        "mem"     => $matches[11][$index],
        "time"    => $matches[12][$index],
        "command" => $matches[13][$index],
      ];
    }

    return $processes;
  }

  top();
?>