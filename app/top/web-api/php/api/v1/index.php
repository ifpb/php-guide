<?php

require "util.php";

$result = shell_exec("top -n1 -b");
$top = top_encode($result);

header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
echo json_encode($top);
