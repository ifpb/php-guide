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
        "minute" => $matches[3],
        "hour" => $matches[4],
        "day" => $matches[5],
        "month" => $matches[6],
        "weekDay" => $matches[7],
        "task" => $matches[8],
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