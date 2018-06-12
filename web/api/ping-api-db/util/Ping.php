<?php
namespace Util;
use Model\Icmp;
use Model\Packet;
use Model\Host;

require_once __DIR__."/../model/icmp.php";
require_once __DIR__."/../model/packet.php";
require_once __DIR__."/../model/host.php";

class Ping {

  function exec($host, $count) {
    $this->count = $count;
    $this->host = $host;

    $command = "ping -c{$this->count} {$this->host}";
    $this->result = shell_exec($command);
    
    $this->pingInfo = $this->parse();
    $this->loadDB();

    return $this->pingInfo;
  }

  function loadDB() {
    $icmp = new Icmp();
    $packet = new Packet();
    $host = new Host();

    $hostId = $host->readOrCreate($this->pingInfo["host"], $this->pingInfo["ip"]);
    $icmpId = $icmp->create($this->pingInfo["statistics"]["transmitted"], $this->pingInfo["statistics"]["received"], $hostId);
    foreach ($this->pingInfo["packets"] as $packetInfo) {
      $packet->create($packetInfo["seq"], $packetInfo["ttl"], $packetInfo["time"], $icmpId);
    }
  }

  function parse() {
    $json = [];
    $json["host"] = $this->host;
    $json["ip"] = "";
    $json["packets"] = [];
    $json["statistics"] = [];

    $regex = "/\(([\d\.]+)\)/";
    preg_match($regex, $this->result, $matches);
    $json["ip"] = $matches[1];

    $regex = "/icmp_seq=(\d+) ttl=(\d+) time=([\d\.]+)/";
    preg_match_all($regex, $this->result, $matches);
    foreach($matches[1] as $key => $sequence){
      $json["packets"][] = [
        "seq" => (int) $matches[1][$key],
        "ttl" => (int) $matches[2][$key],
        "time" => (float) $matches[3][$key]
      ];
    }

    $regex = "/(\d+) packets transmitted, (\d+) (packets received|received)/";
    preg_match($regex, $this->result, $matches);
    $json["statistics"]["transmitted"] = (int) $matches[1];
    $json["statistics"]["received"] = (int) $matches[2];
    $json["statistics"]["losted"] = $matches[1] - $matches[2];

    $regex = "/min\/avg\/max\/(stddev|mdev) = ([\d\.]+)\/([\d\.]+)\/([\d\.]+)\/([\d\.]+)/";
    preg_match($regex, $this->result, $matches);
    $json["statistics"]["min"] = (float) $matches[1];
    $json["statistics"]["avg"] = (float) $matches[2];
    $json["statistics"]["max"] = (float) $matches[3];
    $json["statistics"]["stddev"] = (float) $matches[4];

    return $json;
  }
}