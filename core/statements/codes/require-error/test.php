<?php
require("lib/util.php");
require("lib/math.php");

echo sum(1, 1);

// =>
// PHP Fatal error:  Cannot redeclare sum() (previously declared in 
// codes/require-error/lib/math.php:2) in 
// codes/require-error/lib/math.php on line 4
?>