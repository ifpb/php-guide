<?php
	function ping($host, $count) {
		$command = "./ping.sh ${host} ${count}";
		return shell_exec($command);
	}

	$host = $_GET['host'] ?? '';
	$count = $_GET['count'] ?? '1';

	header("Content-type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
	echo ping($host, $count);
?>
