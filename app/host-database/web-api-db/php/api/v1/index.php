<?php
use Model\Host;

require(__DIR__.'/../../model/host.php');

$action = $_GET['a'] ?? 'readAll';
$hostDB = new Host();
$json = '';

if ($action === 'create') {
  $name = $_GET['name'] ?? null;
  $address = $_GET['address'] ?? null;
  $result = $hostDB->create($name, $address);
  $json = ['status' => ($result ? 'host created.' : 'host not created.')];
} else if ($action === 'read') {
  $id = $_GET['id'] ?? null;
  $json = $hostDB->read($id);
} else if ($action === 'readAll') {
  $json = $hostDB->readAll();
} else if ($action === 'update') {
  $id = $_GET['id'] ?? null;
  $name = $_GET['name'] ?? null;
  $address = $_GET['address'] ?? null;
  $result = $hostDB->update($id, $name, $address);
  $json = ['status' => ($result ? 'host updated.' : 'host not updated.')];
} else if ($action === 'remove') {
  $id = $_GET['id'] ?? null;
  $result = $hostDB->remove($id);
  $json = ['status' => ($result ? 'host removed.' : 'host not removed.')];
}

header('Content-type: application/json; charset=UTF-8');
header("Access-Control-Allow-Origin: *");
echo json_encode($json);
?>