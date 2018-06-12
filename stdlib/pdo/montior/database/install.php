<?php

require_once('config.php');

function install() {
  try {
    $schema = file_get_contents('database/schema.sql');
    $connection = new PDO(DB.":host=".DBHOST, DBUSER, DBPWD);
    $connection->exec($schema);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}

install();