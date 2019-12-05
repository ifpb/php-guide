<?php

function top_encode($result)
{
  $processes = [];

  $regex = "/(\d+)\s+(\S+)\s+(\d+)\s+(\d+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(.+)/";
  preg_match_all($regex, $result, $matches);

  foreach ($matches[2] as $index => $pid) {
    $processes[] = [
      "pid"     => $matches[1][$index],
      "user"    => $matches[2][$index],
      "pr"      => $matches[3][$index],
      "ni"      => $matches[4][$index],
      "virt"    => $matches[5][$index],
      "res"     => $matches[6][$index],
      "shr"     => $matches[7][$index],
      "s"       => $matches[8][$index],
      "cpu"     => $matches[9][$index],
      "mem"     => $matches[10][$index],
      "time"    => $matches[11][$index],
      "command" => $matches[12][$index],
    ];
  }

  return $processes;
}
