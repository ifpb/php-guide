<?php
namespace Model;

use Database\Database;
use \PDO;

require_once __DIR__."/../database/database.php";

class Address extends Database {

  public function create($ip, $mask, $mac) {
    $sql = "INSERT INTO address (ip, mask, mac) VALUES ('${ip}', '${mask}', '${mac}')";
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
    $sql = "SELECT * FROM address WHERE id = ${id}";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

  public function readByIp($ip) {
    $sql = "SELECT * FROM address WHERE ip='${ip}'";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

  public function readAll() {
    $sql = "SELECT * FROM address";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
  }

  public function readOrCreate($ip, $mask, $mac) {
    $result = $this->readByIp($ip);

    if ($result) {
      return $result;
    } else {
      return $this->create($ip, $mask, $mac);
    }
  }
  
  public function update($id, $ip, $mask, $mac) {
    $sql = "UPDATE address
            SET ip='${ip}', mask='${mask}', mac='${mac}'
            WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }
  
  public function remove($id) {
    $sql = "DELETE FROM address WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }

}
