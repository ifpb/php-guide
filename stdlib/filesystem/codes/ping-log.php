<pre>
<?php
  // get host
  $host = $_GET['host'] ?? null;

  // shell_exec -> string
  $command = "ping -c1 {$host}";
  $ping = shell_exec($command);

  $log = file_get_contents('ping.log');

  // store json
  $time = date('r');
  file_put_contents('ping.log', "${log}\n>>>${time}\n${ping}");

  echo file_get_contents('ping.log');
?>
</pre>