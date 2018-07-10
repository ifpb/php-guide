<?php
  function crontrab_parse($crontab) {
    $crontabArray = [];
    foreach (explode("\n", $crontab) as $cronLine) {
      $regex = '/(@yearly|@monthly|@daily|@reboot) (.+)|([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) (.+)/';
      preg_match($regex, $cronLine, $matches);
      if (in_array($matches[1], ["@yearly", "@monthly", "@daily", "@reboot"])) {
        $crontabArray[] = [
          "keyword" => $matches[1],
          "task" => $matches[2],
        ];
      } else {
        $crontabArray[] = [
          "minute" => $matches[1],
          "hour" => $matches[2],
          "day" => $matches[3],
          "month" => $matches[4],
          "weekDay" => $matches[5],
          "task" => $matches[6],
        ];
      } 
    }
    return $crontabArray;
  }

  $crontab = file_get_contents('crontab.txt');
  echo json_encode(crontrab_parse($crontab));
?>