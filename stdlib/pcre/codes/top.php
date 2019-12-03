<pre>
<?php
$top = shell_exec("top -n1 -b");
$regex = "/Tasks:  (\d+) total,\s+(\d+) running,\s+(\d+) sleeping,\s+(\d+) stopped,\s+(\d+) zombie/";
preg_match($regex, $top, $matches);
var_dump($matches);
?>