<?php
require_once('database.php');

$connection = connect();

function delete($id) {
  global $connection;

  $sql = "DELETE FROM host WHERE id=${id}";

  try {
    return $connection->exec($sql);
  } catch(PDOExecption $e) { 
    $connection->rollback(); 
    print "Error!: " . $e->getMessage(); 
  }
}
