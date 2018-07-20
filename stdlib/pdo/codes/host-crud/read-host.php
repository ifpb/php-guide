<?php

require_once('database.php');
require_once('create-host.php');

$connection = connect();

/**
 *  Read by ID
 */
function read($id) {
  global $connection;
  $sql = "SELECT * FROM host WHERE id = ${id}";
  $pdoStm = $connection->query($sql);
  return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
}

var_dump(read(2));
//=>
// array(3) {
//   ["id"]=>  string(1) "2"
//   ["name"]=>  string(10) "dns google"
//   ["address"]=>  string(7) "8.8.8.8"
// }

/**
 * Read by Name and Address
 */
function readByNameAddress($name, $address) {
  global $connection;
  $sql = "SELECT * FROM host WHERE name='${name}' AND address='${address}'";
  $pdoStm = $connection->query($sql);
  return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
}

var_dump(readByNameAddress("dns google", "8.8.8.8"));
//=>
// array(3) {
//   ["id"]=>  string(1) "2"
//   ["name"]=>  string(10) "dns google"
//   ["address"]=>  string(7) "8.8.8.8"
// }

var_dump(readByNameAddress("dns google", "8.8.4.4")); //=> bool(false)

/**
 * Read All
 */
function readAll() {
  global $connection;
  $sql = "SELECT * FROM host";
  $pdoStm = $connection->query($sql);
  return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
}

var_dump(readAll());
//=>
// array(2) {
//   [0]=>array(3) {
//     ["id"]=>string(1) "1"
//     ["name"]=>string(14) "www.google.com"
//     ["address"]=>string(14) "216.58.222.100"
//   }
//   [1]=>array(3) {
//     ["id"]=>string(1) "2"
//     ["name"]=>string(10) "dns google"
//     ["address"]=>string(7) "8.8.8.8"
//   }
// }

/**
 * Read or Create
 */
function readOrCreate($name, $address) {
  global $connection;
  $result = readByNameAddress($name, $address);

  if ($result) {
    return $result;
  } else {
    return create($name, $address);
  }
}

var_dump(readOrCreate("dns google", "8.8.8.8"));
//=>
// array(3) {
//   ["id"]=>  string(1) "2"
//   ["name"]=>  string(10) "dns google"
//   ["address"]=>  string(7) "8.8.8.8"
// }

var_dump(readOrCreate("dns google", "8.8.4.4")); //=> string(1) "3"