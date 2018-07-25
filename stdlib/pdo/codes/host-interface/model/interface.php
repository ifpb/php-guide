<?php
namespace Model;

use Database\Database;
use \PDO;

require_once __DIR__."/../database/database.php";

class NetInterface extends Database {

  public function create($name, $ip, $mask, $mac, $host_id) {
    $sql = "INSERT INTO interface (name, ip, mask, mac, host_id) VALUES ('${name}', '${ip}', '${mask}', '${mac}', ${host_id})";
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
    $sql = "SELECT * FROM interface WHERE id = ${id}";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

  public function readByName($name) {
    $sql = "SELECT * FROM interface WHERE name='${name}'";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

  public function readAll() {
    $sql = "SELECT * FROM interface";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
  }

  public function readOrCreate($name, $ip, $mask, $mac, $host_id) {
    $result = $this->readByName($name);

    if ($result) {
      return $result;
    } else {
      return $this->create($name, $ip, $mask, $mac, $host_id);
    }
  }
  
  public function update($id, $name, $ip, $mask, $mac, $host_id) {
    $sql = "UPDATE interface
            SET name='${name}', ip='${ip}', mask='${mask}', mac='${mac}', host_id=${host_id}
            WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }
  
  public function remove($id) {
    $sql = "DELETE FROM interface WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }

}
