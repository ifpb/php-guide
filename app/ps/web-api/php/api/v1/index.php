<?php

require 'util.php';

$result = shell_exec("ps aux");
$ps = ps_encode($result);

header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
echo json_encode($ps);
