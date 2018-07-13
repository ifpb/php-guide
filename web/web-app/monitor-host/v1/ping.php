<?php
namespace Api;

use Util\Ping;

require_once __DIR__."/../util/ping.php";

$host = $_GET["host"] ?? null;
$count = $_GET["count"] ?? 1;

$json = '';

if($host && $pingInfo){
  http_response_code(500);
  $json = ["error" => "Unknown host"];
} else {
  $ping = new Ping();
  $pingInfo = $ping->exec($host, $count);
  $json = $pingInfo;
}

header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

echo json_encode($json);
