<?php
require_once('database.php');

$connection = connect();

function remove($id) {
  global $connection;

  $sql = "DELETE FROM host WHERE id=${id}";

  try {
    return $connection->exec($sql);
  } catch(PDOExecption $e) { 
    $connection->rollback(); 
    print "Error!: " . $e->getMessage(); 
  }
}

var_dump(remove(2)); //=> int(1)
var_dump(remove(2)); //=> int(0)