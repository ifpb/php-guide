<?php

  function ping($address, $count=4) {
    $command = "ping -c${count} ${address} | grep icmp_seq | awk -F '[:=]'  '{print $5}'| cut -f1 -d' ' | tr '\n' ',' ";
    $result = shell_exec($command);
    return substr($result, 0, -1);
  }

  echo ping('8.8.8.8', 3);
  
?>