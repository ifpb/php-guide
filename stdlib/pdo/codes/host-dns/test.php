<pre>
<?php

use Model\Host;
use Model\Dns;

require_once('model/host.php');
require_once('model/dns.php');

$host = new Host();
$dns = new Dns();

// Create  
$hostId = $host->create('pc3');
var_dump($hostId); //=> string(1) "3"
$dnsId = $dns->create('1.1.1.1');
var_dump($dnsId);  //=> string(1) "3"

// Read
var_dump($host->read($hostId));
//=>
// array(2) {
//   ["id"]=>string(1) "3"
//   ["name"]=>string(3) "pc3"
// }

// Update
$host->update($hostId, 'pc03');
var_dump($host->read($hostId));
//=>
// array(2) {
//   ["id"]=>string(1) "3"
//   ["name"]=>string(4) "pc03"
// }

// Delete
var_dump($host->remove($hostId)); //=> int(1)
var_dump($host->read($hostId));   //=> bool(false)
var_dump($host->read($dnsId));    //=> bool(false)

$host2 = $host->readOrCreate('pc02');
$allDns = $host->getDns($host2["id"]);
var_dump($allDns);
//=>
// array(1) {
//   [0]=>array(2) {
//     ["id"]=>string(1) "1"
//     ["ip"]=>string(7) "8.8.8.8"
//   }
// }

$host->addDns($host2["id"], 2);
$host->addDns($host2["id"], 3);
$allDns = $host->getDns($host2["id"]);
var_dump($allDns);
// =>
// array(3) {
//   [0]=>array(2) {
//     ["id"]=>  string(1) "1"
//     ["ip"]=>  string(7) "8.8.8.8"
//   }
//   [1]=>array(2) {
//     ["id"]=>  string(1) "2"
//     ["ip"]=>  string(7) "8.8.4.4"
//   }
//   [2]=>array(2) {
//     ["id"]=>  string(1) "3"
//     ["ip"]=>  string(7) "1.1.1.1"
//   }
// }

$host->rmDns($host2["id"], 3);
$allDns = $host->getDns($host2["id"]);
var_dump($allDns);
// =>
// array(2) {
//   [0]=>array(2) {
//     ["id"]=>  string(1) "1"
//     ["ip"]=>  string(7) "8.8.8.8"
//   }
//   [1]=>array(2) {
//     ["id"]=>  string(1) "2"
//     ["ip"]=>  string(7) "8.8.4.4"
//   }
// }
?>
</pre>