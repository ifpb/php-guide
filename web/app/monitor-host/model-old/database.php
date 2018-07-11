<?php

class Database {

  protected $connection;

  function __construct($db, $dbname, $host, $user, $password){
    try {
      $this->connection = new PDO("{$db}:dbname={$dbname};host={$host}", $user, $password);
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }

}
