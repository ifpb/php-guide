<?php
use Model\Host;

require('model/host.php');

$host = new Host();

// Create IFPB 
$hostIFPBId = $host->create('www.ifpb.edu.br', '200.129.77.62');
var_dump($hostIFPBId);

// Get or create IFPB
$hostIFPB = $host->readOrCreate('www.ifpb.edu.br', '200.129.77.62');
var_dump($hostIFPB);

// Create IFRN
$hostIFRNId = $host->create('www.ifrn.edu.br', '200.137.2.130');
var_dump($hostIFRNId);

// Update IFRN
$host->update($hostIFRNId, 'www.ifrn.edu.br', '200.137.2.131');
$hostIFRN = $host->read($hostIFRNId);
var_dump($hostIFRN);

// Delete IFRN
var_dump($host->remove($hostIFRNId));