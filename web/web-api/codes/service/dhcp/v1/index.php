<?php
require_once('util.php');

$action = $_GET['action'] ?? null;
$json = '';

if ($action == 'add-ip') {
  $comment = $_GET['comment'] ?? null;
  $mac = $_GET['mac'] ?? null;
  $host = $_GET['host'] ?? null;
  $ip = $_GET['ip'] ?? null;
  $sector = $_GET['sector'] ?? null;
  if ($action && $comment && $mac && $host && $ip && $sector) {
    addIp($comment, $mac, $host, $ip, $sector);
    $json = json_encode(['status' => 'host added successfully']);
  } else {
    $json = json_encode(['status' => 'paras invalids']);
  }
} elseif ($action == 'rm-ip') {
  $ip = $_GET['ip'] ?? null;
  if ($ip) {
    rmIp($ip);
    $json = json_encode(['status' => 'host removed successfully']);
  } else {
    $json = json_encode(['status' => 'paras invalids']);
  }
} elseif ($action == 'list-ips') {
  if ($action) {
    $json = json_encode(getLeases());
  } else {
    $json = json_encode(['status' => 'paras invalids']);
  }
}

header('Content-type: application/json; charset=UTF-8');
header("Access-Control-Allow-Origin: *");
echo $json;
?>