<?php

function getLinks()
{
  $interfaces = [];

  $commandOutput = shell_exec("ip addr show");

  $regex = "/(\d+): (\S+): <(\S+)> mtu (\d+) qdisc (\S+) state (\S+) group (\S+).*\s+link\/(\S+) (\S+) brd (\S+)(.*\s+inet (\S+)\/(\d+)( brd )?(\S+)? scope)?/";
  preg_match_all($regex, $commandOutput, $matches);
  foreach ($matches[1] as $index => $value) {
    $values = [
      'id' => $matches[1][$index],
      'name' => $matches[2][$index],
      'mtu' => $matches[4][$index],
      'state' => $matches[6][$index],
      'link' => $matches[8][$index],
      'mac' => $matches[9][$index],
      'macbrd' => $matches[10][$index],
    ];
    if ($matches[12][$index]) {
      $values['ip'] = $matches[12][$index];
      $values['ipmask'] = $matches[13][$index];
    }
    if ($matches[15][$index]) {
      $values['ipbrd'] = $matches[15][$index];
    }
    $interfaces[] = $values;
  }

  return $interfaces;
}

function getLink($name)
{
  $interface = [];

  $commandOutput = shell_exec("ip -s link show $name");
  $regex = "/(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/";
  preg_match_all($regex, $commandOutput, $matches);

  $interface['name'] = $name;
  $interface['stats'] = [];
  $interface['stats']['rx'] = [
    'bytes' => $matches[1][0],
    'packets' => $matches[2][0],
    'errors' => $matches[3][0],
    'dropped' => $matches[4][0],
    'overrun' => $matches[5][0],
    'mcast' => $matches[6][0],
  ];

  $interface['stats']['tx'] = [
    'bytes' => $matches[1][1],
    'packets' => $matches[2][1],
    'errors' => $matches[3][1],
    'dropped' => $matches[4][1],
    'carrier' => $matches[5][1],
    'collsns' => $matches[6][1],
  ];

  return $interface;
}
