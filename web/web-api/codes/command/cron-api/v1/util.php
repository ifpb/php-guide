<?php
// TODO Adapter Mac OS, Ubuntu

function getTasks() {
  $crontab = shell_exec('crontab -l');
  $crontabArray = [];
  foreach (explode("\n", $crontab) as $cronLine) {
    $regex = '/(@yearly|@monthly|@daily|@reboot) (.+)|([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) (.+)/';
    preg_match($regex, $cronLine, $matches);
    if(empty($matches))
      return $crontabArray;
    if (in_array($matches[1], ["@yearly", "@monthly", "@daily", "@reboot"])) {
      $crontabArray[] = [
        "keyword" => $matches[1],
        "task" => $matches[2],
      ];
    } else if(isset($matches[6])) {
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

function rmTask($remove) {
  $crontabContent = shell_exec('crontab -l');
  $crontabContent = explode("\n", $crontabContent);
  foreach($crontabContent as $lineNumber => $line) {
    if($lineNumber === intval($remove))
      unset($crontabContent[$lineNumber]);
  }
  $crontabContent = implode("\n", $crontabContent);
  shell_exec("crontab <<EOF
${crontabContent}
EOF");
  return ["status" => "task removed"];
}

function addTask($minute, $hour, $day, $month, $weekDay, $task) {
  $time = "$minute $hour $day $month $weekDay";
  $crontab = "$time $task";
  $crontabContent = shell_exec('crontab -l');
  shell_exec("crontab <<EOF
${crontabContent}${crontab}
EOF");
  return ["status" => "task added"];
}
?>