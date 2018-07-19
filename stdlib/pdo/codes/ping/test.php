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

// Create IFPB 
$hostId = $host->create('www.ifpb.edu.br', '200.129.77.62');

$icmpId = $icmp->create(2, 2, $hostId);

$packet->create(0, 63, 123, $icmpId);
$packet->create(1, 63, 121, $icmpId);

// Update IFPB
$hostIFPB = $host->readOrCreate('www.ifpb.edu.br', '200.129.77.62');

$icmpId = $icmp->create(2, 2, $hostIFPB["id"]);

$packet->create(0, 63, 123, $icmpId);
$packet->create(1, 63, 121, $icmpId);

// Create IFRN
$hostId = $host->create('www.ifrn.edu.br', '200.137.2.130');

$icmpId = $icmp->create(2, 2, $hostId);

$packet->create(0, 63, 104, $icmpId);
$packet->create(1, 63, 104, $icmpId);

// Print all ICMPs
print_r($icmp->readJoinAll());
