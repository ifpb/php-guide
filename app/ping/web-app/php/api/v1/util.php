<?php

function ping($host, $count)
{
  $pingInfo = [];

  $result = ping_command($host, $count);

  if ($host && $result) {
    $pingInfo["host"] = $host;
    $pingInfo += ping_encode($result);
  } else {
    http_response_code(500);
    $pingInfo['error'] = 'Unknown host';
  }

  return $pingInfo;
}

function is_unknown_host($result)
{
  return strpos($result, 'Unknown host') !== false;
}

function ping_command($host, $count)
{
  $command = "ping -c{$count} {$host}";
  $result = shell_exec($command);
  return is_unknown_host($result) ? NULL : $result;
}

function ping_encode($result)
{
  $json = [];

  // ip
  $regex = "/\(([\d\.]+)\)/";
  preg_match($regex, $result, $matches);
  $json["ip"] = $matches[1];

  // packets
  $json["packets"] = [];
  $regex = "/icmp_seq=(\d+) ttl=(\d+) time=([\d\.]+)/";
  preg_match_all($regex, $result, $matches);
  foreach ($matches[1] as $key => $sequence) {
    $json["packets"][] = [
      "seq" => (int) $matches[1][$key],
      "ttl" => (int) $matches[2][$key],
      "time" => (float) $matches[3][$key]
    ];
  }

  // statistics
  $json["statistics"] = [];
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
