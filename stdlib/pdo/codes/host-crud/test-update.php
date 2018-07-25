<?php
require_once('update-host.php');

var_dump(update('Google DNS', '8.8.8.8', 2)); //=> int(1)
var_dump(update('Google DNS', '8.8.8.8', 2)); //=> int(0)
