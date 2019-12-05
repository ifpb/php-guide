<?php

require 'util.php';

$a = $_GET['a'] ?? 'links';
$response = [];

if ($a == 'links') {
  $response = getLinks();
} else if ($a == 'link') {
  $interface = $_GET['link'];
  $response = getLink($interface);
}

if (empty($response)) {
  $response = ["error" => "Unknown info"];
  http_response_code(500);
}

header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
echo json_encode($response);
