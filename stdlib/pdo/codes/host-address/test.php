<?php
use Model\Host;
use Model\Address;

require_once('model/host.php');
require_once('model/address.php');

$host = new Host();
$address = new Address();

// Create  
$addId = $address->create('200.129.77.62', '255.255.255.0', '08:00:27:8B:80:A3');
var_dump($addId);  //=> string(1) "2"
$hostId = $host->create('www.ifpb.edu.b', $addId);
var_dump($hostId); //=> string(1) "2"

// Read
var_dump($host->read($hostId));
//=>
// array(2) {
//   ["id"]=>string(1) "2"
//   ["name"]=>string(15) "www.ifpb.edu.b"
//   ["host_id"]=>string(1) "2"
// }

// Update
$host->update($hostId, 'www.ifpb.edu.br', 2);
var_dump($host->read($hostId));
//=>
// array(2) {
//   ["id"]=>string(1) "2"
//   ["name"]=>string(15) "www.ifpb.edu.br"
//   ["host_id"]=>string(1) "2"
// }

// Delete
var_dump($host->remove($hostId)); //=> int(1)
var_dump($host->read($hostId));   //=> bool(false)
var_dump($host->read($addId));    //=> bool(false)
?>