<?php

require "util.php";

$host = $_GET["host"] ?? null;
$count = $_GET["count"] ?? 1;

$pingInfo = ping($host, $count);

header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
echo json_encode($pingInfo);
