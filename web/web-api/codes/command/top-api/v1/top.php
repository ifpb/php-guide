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
      $process = [];
      $process["pid"] = $matches[2][$index];
      $process["user"] = $matches[3][$index];
      $process["pr"] = $matches[4][$index];
      $process["ni"] = $matches[5][$index];
      $process["virt"] = $matches[6][$index];
      $process["res"] = $matches[7][$index];
      $process["shr"] = $matches[8][$index];
      $process["s"] = $matches[9][$index];
      $process["cpu"] = $matches[10][$index];
      $process["mem"] = $matches[11][$index];
      $process["time"] = $matches[12][$index];
      $process["command"] = $matches[13][$index];
      $processes[] = $process;
    }

    return $processes;
  }

  top();
?>