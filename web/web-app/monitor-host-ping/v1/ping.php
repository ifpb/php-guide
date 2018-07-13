<?php

  require_once __DIR__."/../model/icmp-request-db.php";

  function extractPingInfo($result) {
    $json["ip"] = "";
    $json["packets"] = [];
    $json["statistics"] = [];

    $regex = "/\(([\d\.]+)\)/";
    preg_match($regex, $result, $matches);
    $json["ip"] = $matches[1];

    $regex = "/icmp_seq=(\d+) ttl=(\d+) time=([\d\.]+)/";
    preg_match_all($regex, $result, $matches);
    foreach($matches[1] as $key => $sequence){
      $json["packets"][] = [
        "seq" => (int) $matches[1][$key],
        "ttl" => (int) $matches[2][$key],
        "time" => (float) $matches[3][$key]
      ];
    }

    $regex = "/(\d+) packets transmitted, (\d+) (packets received|received)/";
    preg_match($regex, $result, $matches);
    $json["statistics"]["transmitted"] = (int) $matches[1];
    $json["statistics"]["received"] = (int) $matches[2];
    $json["statistics"]["losted"] = $matches[1] - $matches[2];

    $regex = "/min\/avg\/max\/(stddev|mdev) = ([\d\.]+)\/([\d\.]+)\/([\d\.]+)\/([\d\.]+)/";
    preg_match($regex, $result, $matches);
    $json["statistics"]["min"] = (float) $matches[1];
    $json["statistics"]["avg"] = (float) $matches[2];
    $json["statistics"]["max"] = (float) $matches[3];
    $json["statistics"]["stddev"] = (float) $matches[4];

    return $json;
  }

  $host = $_GET["host"] ?? null;
  $count = $_GET["count"] ?? 1;
  $jsonError = ["error" => "Unknown host"];
  $pingInfo = [];

  $command = "ping -c{$count} {$host}";
  $result = shell_exec($command);

  if($result){
    $pingInfo = extractPingInfo($result);
    $pingInfo["host"] = $host;
  }

  $response = ($host && $pingInfo) ? $pingInfo : $jsonError ;

  if(isset($response["error"])){
    http_response_code(500);
  }
  else {
    $icmpResquetDb = new IcmpRequestDb("mysql", "ping_api", "localhost", "root", "abc123");
    $address = $pingInfo["host"];
    $ip = $pingInfo["ip"];
    $transmitted = $pingInfo["statistics"]["transmitted"];
    $received = $pingInfo["statistics"]["received"];
    $icmpResquetDb->create($address, $ip, $transmitted, $received);
  }

  header("Content-type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  echo json_encode($response);
