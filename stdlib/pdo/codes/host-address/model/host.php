<?php
namespace Model;

use Database\Database;
use \PDO;

require_once __DIR__."/../database/database.php";

class Host extends Database {

  public function create($name, $address_id) {
    $sql = "INSERT INTO host (name, address_id) VALUES ('${name}', ${address_id})";
    var_dump($sql);
    try {
      $this->connection->exec($sql);
      return $this->connection->lastInsertId();
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }

  public function read($id) {
    $sql = "SELECT * FROM host WHERE id = ${id}";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

  public function readByName($name) {
    $sql = "SELECT * FROM host WHERE name='${name}'";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

  public function readAll() {
    $sql = "SELECT * FROM host";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
  }

  public function readOrCreate($name, $address_id) {
    $result = $this->readByName($name);

    if ($result) {
      return $result;
    } else {
      return $this->create($name, $address_id);
    }
  }
  
  public function update($id, $name, $address_id) {
    $sql = "UPDATE host
            SET name='${name}', address_id='${address_id}'
            WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }
  
  public function remove($id) {
    $sql = "DELETE FROM host WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }

}
