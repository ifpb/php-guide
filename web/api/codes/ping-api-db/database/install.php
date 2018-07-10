<?php

require_once('config.php');

function install() {
  try {
    $schema = file_get_contents('database/schema.sql');
    $connection = new PDO(DB.":host=".DBHOST, DBUSER, DBPWD);
    try {
      $connection->exec($schema);
    } catch(PDOExecption $e) { 
      $connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    }
    echo 'database created';
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}

install();