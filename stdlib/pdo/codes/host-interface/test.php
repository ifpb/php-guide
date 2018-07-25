<?php
use Model\Host;
use Model\NetInterface;

require_once('model/host.php');
require_once('model/interface.php');

$host = new Host();
$interface = new NetInterface();

// Create  
$hostId = $host->create('pc2');
var_dump($hostId); //=> string(1) "2"
$ethId = $interface->create('eth0', '10.0.10.10', '255.255.255.0', '08:00:27:8B:80:A5', 2);
var_dump($ethId);  //=> string(1) "3"

// Read
var_dump($host->read($hostId));
//=>
// array(2) {
//   ["id"]=>string(1) "2"
//   ["name"]=>string(3) "pc2"
// }

// Update
$host->update($hostId, 'pc02', 2);
var_dump($host->read($hostId));
//=>
// array(2) {
//   ["id"]=>string(1) "2"
//   ["name"]=>string(4) "pc02"
// }

// Delete
var_dump($host->remove($hostId)); //=> int(1)
var_dump($host->read($hostId));   //=> bool(false)
var_dump($host->read($ethId));    //=> bool(false)
?>