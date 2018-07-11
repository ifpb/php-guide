<?php
use Model\Icmp;
use Model\Packet;
use Model\Host;

require('model/icmp.php');
require('model/packet.php');
require('model/host.php');

$icmp = new Icmp();
$packet = new Packet();
$host = new Host();

$hostId = $host->create('www.ifpb.edu.br', '200.129.77.62');

$icmpId = $icmp->create(2, 2, $hostId);

$packet->create(0, 63, 123, $icmpId);
$packet->create(1, 63, 121, $icmpId);


$hostId = $host->readOrCreate('www.ifpb.edu.br', '200.129.77.62');

$icmpId = $icmp->create(2, 2, $hostId);

$packet->create(0, 63, 123, $icmpId);
$packet->create(1, 63, 121, $icmpId);

$hostId = $host->create('www.ifrn.edu.br', '200.137.2.130');

$icmpId = $icmp->create(2, 2, $hostId);

$packet->create(0, 63, 104, $icmpId);
$packet->create(1, 63, 104, $icmpId);

print_r($icmp->readJoinAll());
