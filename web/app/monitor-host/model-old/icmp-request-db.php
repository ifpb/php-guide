<?php

require_once "database.php";

class IcmpRequestDb extends Database {

  public function create($address, $ip, $transmitted, $received){
    $sql = "insert into request_icmp (address, ip, transmitted, received, created_at)".
            " values ('{$address}', '{$ip}', {$transmitted}, {$received}, now());";
    $this->connection->exec($sql);
  }

  // public function read($id){
  //
  // }
  //
  // public function readAll(){
  //
  // }
  //
  // public function update($id, $...){
  //   $sql = "";
  //   $this->connection->exec();
  // }
  //
  // public function remove($id){
  //   $sql = "";
  //   $this->connection->exec();
  // }

}
