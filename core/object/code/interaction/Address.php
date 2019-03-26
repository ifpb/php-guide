<?php

class Address
{
  function __construct($ip, $mask)
  {
    $this->ip = $ip;
    $this->mask = $mask;
  }
}

$ips = [
  new Address("192.168.0.2", "255.255.255.0"),
  new Address("192.168.0.10", "255.255.255.0"),
  new Address("192.168.0.26", "255.255.255.0"),
  new Address("192.168.0.30", "255.255.255.0")
];

foreach ($ips as $ip) {
  print("{$ip->ip}/{$ip->mask}\n");
}
//=>
// 192.168.0.2/255.255.255.0
// 192.168.0.10/255.255.255.0
// 192.168.0.26/255.255.255.0
