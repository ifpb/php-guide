<?php

$crontab = shell_exec("crontab -l");
$command = "00 09 * * 1-3 echo hello";

shell_exec("crontab <<EOF
${crontab}
${command}
EOF");

?>
