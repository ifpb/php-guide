<?php

function systemInfo(){
  $operatingSystem = str_replace('Description:	', '', `lsb_release -d`);
  $hostname = `hostname`;
  $username = `whoami`;
  $uptime = str_replace('up ', '', `uptime -p`);

  return [
    'operatingSystem' => trim($operatingSystem),
    'hostname' => trim($hostname),
    'username' => trim($username),
    'uptime' => trim($uptime)
  ];
}

function cpuStatus(){
  $topResult = `top -b -n 1`;

  $regex = '/load average: (.+), (.+), (.+)\n/';
  preg_match($regex, $topResult, $matched);
  $last1 = (float) $matched[1];
  $last10 = (float) $matched[2];
  $last15 = (float) $matched[3];

  $regex = '/: (.+) us, (.+) sy, (.+) ni, (.+) id/';
  preg_match($regex, $topResult, $matched);
  $cpuUsageUser = (float) $matched[1];
  $cpuUsageSys = (float) $matched[2];
  $cpuUsageIdle = (float) $matched[4];

  return [
    'cpuLast' => [
      'last1' => $last1,
      'last10' => $last10,
      'last15' => $last15
    ],
    'cpuUsage' => [
      'cpuUsageUser' => $cpuUsageUser,
      'cpuUsageSys' => $cpuUsageSys,
      'cpuUsageIdle' => $cpuUsageIdle
    ]
  ];
}

function cpuName(){
  $cpuname = `cat /proc/cpuinfo  | grep 'name'`;

  $regex = "/model name\s+: (.+)\n/";
  preg_match($regex, $cpuname, $matched);
  $cpu = $matched[1];

  return [
    'cpu' => $cpu
  ];
}

function memory(){
  $free = `free`;

  $regex = '/Mem:\s+(\d+)\s+(\d+)/';
  preg_match($regex, $free, $matched);
  $memoryUsageUsed = $matched[2]/$matched[1];
  $memoryUsageUnused = 1 - $memoryUsageUsed;

  return [
    'memoryUsageUsed' => (float) number_format(100*$memoryUsageUsed, 1),
    'memoryUsageUnused' => (float) number_format(100*$memoryUsageUnused, 1)
  ];
}

function services(){
    $result = [];

    $services_file = file_get_contents('/etc/services');
    $services = explode("\n", $services_file);

    foreach ($services as $service) {
      if($service && $service[0] == '#')
        continue;
      preg_match("/(.+)\s+(\w+)\/(\w+)\s*(.+)?/", $service, $fields);
      if($fields != null){
        $info = [];
        $info['name'] = trim($fields[1]);
        $info['port'] = $fields[2];
        $info['protocol'] = $fields[3];
        $info['description'] = $fields[4] ?? '';
        $info['description'] = str_replace('# ', '', $info['description']);
        $result[] = $info;
      }
    }
    return $result;
  }

  function servicesStatus() {
    $result = [];

    $connection = ssh2_connect('localhost', 22);
    ssh2_auth_password($connection, 'vagrant', 'vagrant');
    $stream = ssh2_exec($connection, 'sudo service --status-all');
    stream_set_blocking($stream, true);
    $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
    $status = stream_get_contents($stream_out);

    $regex = "/\[ (.) \]  (.+)/";
    preg_match_all($regex, $status, $matches);

    foreach ($matches[2] as $index => $services) {
      $result[] = [
        "service" => $services,
        "status" => $matches[1][$index] === '+' ? 'up' : 'down',
      ];
    }

    return $result;
  }

  function users(){
    $result = [];

    $passwd_file = file_get_contents('/etc/passwd');
    $users = explode("\n", $passwd_file);

    foreach ($users as $user) {
      if($user == '')
        continue;
      $fields = explode(":", $user);

      $info = [];
      $info["username"] = $fields[0]; # User name
      $info["encrypted_password"] = $fields[1] ?? ''; # Encrypted Password
      $info["uid"] = $fields[2] ?? ''; # User ID number (UID)
      $info["gid"] = $fields[3] ?? ''; # User's group ID number (GID)
      $info["gecos"] = $fields[4] ?? ''; # Full name of the user (GECOS)
      $info["home"] = $fields[5] ?? ''; # User home directory
      $info["shell"] = $fields[6] ?? ''; # Login shell

      $result[] = $info;
    }

    return $result;
  }

  function hardware() {
    // TODO lscpu, lshw
  }
