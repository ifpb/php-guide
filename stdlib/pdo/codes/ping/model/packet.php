<?php
namespace Model;

use Database\Database;
use \PDO;

require_once __DIR__."/../database/database.php";

class Packet extends Database {

  public function create($seq, $ttl, $time, $icmp_id) {
    $sql = "INSERT INTO packet (seq, ttl, time, icmp_id)
            VALUES (${seq}, ${ttl}, ${time}, ${icmp_id});";
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
    $sql = "SELECT * FROM packet WHERE id = ${id}";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm->fetch(PDO::FETCH_ASSOC);
  }

  public function readAll() {
    $sql = "SELECT * FROM packet";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function update($id, $seq, $ttl, $time, $icmp_id) {
    $sql = "UPDATE packet
            SET seq=${seq}, ttl=${ttl}, time=${time}, icmp_id=${icmp_id}
            WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }
  
  public function remove($id) {
    $sql = "DELETE FROM packet WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }

}
