<?php

$address = $_GET['address'] ?? '';
$count = $_GET['count'] ?? '4';

function ping($address, $count=4) {
  $command = "ping -c${count} ${address} | grep icmp_seq | awk -F '[:=]'  '{print $5}'| cut -f1 -d' ' | tr '\n' ',' ";
  $result = shell_exec($command);
  return substr($result, 0, -1);
}

$result;

if($address == '') {
  $result = [
    'error' => 'Address not declared.'
  ];
} else {
  $result = [
    'times' => explode(',', ping($address, $count))
  ];
}

header('Content-Type: application/json');
echo json_encode($result);
