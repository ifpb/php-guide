<?php
require_once('util.php');

$action = $_GET['action'] ?? null;
$json = '';

if ($action == 'list-shares') {
  $json = json_encode(getSambaConfiguration());
} elseif ($action == 'rm-share') {
  $section = $_GET['section'] ?? null;
  if ($section) {
    remSharedFolder($section);
    $json = json_encode(['status' => 'remove shared successfully']);
  } else {
    $json = json_encode(['status' => 'params invalids']);
  }
} elseif ($action == 'add-share') {
  $section = $_GET['section'] ?? null;
  $user = $_GET['user'] ?? null;
  $path = $_GET['path'] ?? null;
  $validUsers = $_GET['validUsers'] ?? null;
  $comment = $_GET['comment'] ?? null;
  if ($section && $user && $path && $validUsers && $comment) {
    addSharedFolder($section, $comment, $path, $validUsers);
    $json = json_encode(['status' => 'add shared successfully']);
  } else {
    $json = json_encode(['status' => 'params invalids']);
  }
}

header('Content-type: application/json; charset=UTF-8');
header("Access-Control-Allow-Origin: *");
echo $json;
?>