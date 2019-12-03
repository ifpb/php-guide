<?php
$activeRootSSH = "sed -i 's/\#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config";

$connection = ssh2_connect('localhost', 22);
ssh2_auth_password($connection, 'root', 'root');

ssh2_exec($connection, $activeRootSSH);
ssh2_exec($connection, 'service ssh restart');

echo 'ssh restart';
