<?php

namespace Api;

require_once __DIR__ . "/../util/ping.php";

use Util\Ping;

$host = $_GET["host"] ?? null;
$count = $_GET["count"] ?? 1;

$json = '';

if ($host && $count) {
  $ping = new Ping();
  $pingInfo = $ping->exec($host, $count);
  $json = $pingInfo;
} else {
  http_response_code(500);
  $json = ["error" => "Unknown host"];
}

header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

echo json_encode($json);
