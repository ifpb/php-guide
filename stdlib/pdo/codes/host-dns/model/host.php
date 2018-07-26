<?php
namespace Model;

use Database\Database;
use Model\Dns;
use \PDO;

require_once __DIR__."/../database/database.php";
require_once "dns.php";

class Host extends Database {

  public function create($name) {
    $sql = "INSERT INTO host (name) VALUES ('${name}')";
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

  public function readOrCreate($name) {
    $result = $this->readByName($name);

    if ($result) {
      return $result;
    } else {
      return $this->create($name);
    }
  }
  
  public function update($id, $name) {
    $sql = "UPDATE host
            SET name='${name}'
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

  public function getDns($host_id) {
    $allDns = [];
    $dns = new Dns();
    $sql = "SELECT * FROM host_dns INNER JOIN dns WHERE host_id = ${host_id} and dns_id = dns.id";
    $pdoStm = $this->connection->query($sql);
    if ($pdoStm) {
      $matches = $pdoStm->fetchAll(PDO::FETCH_ASSOC);
      foreach ($matches as $match) {
        $allDns[] = $dns->read($match["id"]);
      }
      return $allDns;
    } else {
      return null;
    };
  }

  public function addDns($host_id, $dns_id) {
    $sql = "INSERT INTO host_dns (host_id, dns_id) VALUES (${host_id}, ${dns_id})";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }

  public function rmDns($host_id, $dns_id) {
    $sql = "DELETE FROM host_dns WHERE host_id = ${host_id} and dns_id = ${dns_id}";
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }

}
