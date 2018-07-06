<?php
  $display_error = "sed -i -r -e 's/display_errors = Off/display_errors = On/g' /etc/php/7.1/apache2/php.ini";

  $connection = ssh2_connect('localhost', 22);
  ssh2_auth_password($connection, 'ubuntu', 'ubuntu');

  ssh2_exec($connection, $display_error);
  ssh2_exec($connection, 'service apache2 restart');
?>