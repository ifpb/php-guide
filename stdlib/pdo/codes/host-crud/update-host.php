<?php
require_once('database.php');

$connection = connect();

function update($name, $address, $id) {
  global $connection;

  $sql = "UPDATE host
          SET name='${name}', address='${address}'
          WHERE id=${id}";

  try {
    return $connection->exec($sql);
  } catch(PDOExecption $e) { 
    $connection->rollback(); 
    print "Error!: " . $e->getMessage(); 
  } 
}
