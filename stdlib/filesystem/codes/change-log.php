<pre>
<?php
$substitution = "sed -i -r -e 's/icmp_seq=/icmp_sequence=/g' ping.log";

shell_exec($substitution);

echo file_get_contents('ping.log');
?>
</pre>