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

var_dump(update('Google DNS', '8.8.8.8', 2)); //=> int(1)
var_dump(update('Google DNS', '8.8.8.8', 2)); //=> int(0)