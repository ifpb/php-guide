<?php
  $connection = ssh2_connect('localhost', 22);
  ssh2_auth_password($connection, 'vagrant', 'vagrant');

  $stream = ssh2_exec($connection, 'sudo service --status-all');
  stream_set_blocking($stream, true);
  $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
  $output = stream_get_contents($stream_out);

  preg_match_all("/\[ ([\+-]) \]\s+(.+)/", $output, $matches);

  $status = [];

  foreach($matches[2] as $index=>$service) {
    $status[$service] = $matches[1][$index] == '+' ? 'up' : 'down';
  }

  $json = json_encode($status);

  header('Content-type: application/json; charset=UTF-8');
  echo $json;
?>