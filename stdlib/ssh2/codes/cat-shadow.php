<?php
$connection = ssh2_connect('localhost', 22);
ssh2_auth_password($connection, 'root', 'root');

$stream = ssh2_exec($connection, 'cat /etc/shadow');
stream_set_blocking($stream, true);
$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
$output = stream_get_contents($stream_out);

echo "<pre>{$output}</pre>";
