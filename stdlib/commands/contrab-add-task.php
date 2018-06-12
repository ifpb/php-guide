<!--
  # 1 
  crontab -u <user> -l
  crontab <<EOF
  existente
  novo
  EOF

  # 2
  crontab -u <user> -l > /tmp/user_crontab
  append new entries to /tmp/user_crontab
  crontab -u <user> /tmp/user_crontab
 -->
<?php

$crontab = shell_exec("crontab -l");
$command = "00 09 * * 1-3 echo hello";

shell_exec("crontab <<EOF
${crontab}
${command}
EOF");
