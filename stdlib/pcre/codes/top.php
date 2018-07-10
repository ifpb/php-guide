<pre>
<?php
  $top = shell_exec("top -n1 -b");
  $regex = "/Tasks:  (\d+) total,   (\d+) running,  (\d+) sleeping,   (\d+) stopped,   (\d+) zombie/";
  preg_match($regex, $top, $matches);
  var_dump($matches);
?>