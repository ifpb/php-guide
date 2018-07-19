<?php
namespace Model;

use Database\Database;
use \PDO;

require_once __DIR__."/../database/database.php";

class Icmp extends Database {

  public function create($transmitted, $received, $host_id) {
    $sql = "INSERT INTO icmp (transmitted, received, created_at, host_id)
            VALUES (${transmitted}, ${received}, NOW(), ${host_id});";
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
    $sql = "SELECT * FROM icmp WHERE id = ${id}";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm->fetch(PDO::FETCH_ASSOC);
  }

  public function readAll() {
    $sql = "SELECT * FROM icmp";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function readJoinAll() {
    $sql = "SELECT name, address, transmitted, received, created_at, seq, ttl, time
            FROM icmp INNER JOIN host INNER JOIN packet
            WHERE host.id = icmp.host_id AND icmp.id = packet.icmp_id";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function update($id, $transmitted, $received, $created_at, $host_id) {
    $sql = "UPDATE icmp
            SET transmitted=${transmitted}, received=${received}, created_at=DATE(${created_at}), host_id=${host_id}
            WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }
  
  public function remove($id) {
    $sql = "DELETE FROM icmp WHERE id=${id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }

}
