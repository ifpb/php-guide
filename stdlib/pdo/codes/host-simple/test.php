<?php
use Model\Host;

require('model/host.php');

$host = new Host();

// Create IFPB 
$hostId = $host->create('www.ifpb.edu.br', '200.129.77.62');

// Get or create IFPB
$hostIFPB = $host->readOrCreate('www.ifpb.edu.br', '200.129.77.62');

// Create IFRN
$hostId = $host->create('www.ifrn.edu.br', '200.137.2.130');
