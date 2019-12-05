<?php
function addSharedFolder($section, $comment, $path, $validUsers) {
  // TODO evitar add de uma section existente
  $section = "\n[${section}]
  comment = ${comment}
  path = ${path}
  valid users = ${validUsers}
  browseable = yes
  writeable = yes" ;
  $command = "echo \"${section}\" | sudo tee --append /etc/samba/smb.conf";
  ssh_commands([
    $command,
    'sudo service smbd restart',
    'sudo service nmbd restart'
  ]);
}

function remSharedFolder($section) {
  $smbConfFile = file_get_contents("/etc/samba/smb.conf");
  $regex = "/(\[${section}\])(.|\\n)*(\[)/m";
  $smbConfFile = preg_replace($regex, "$3", $smbConfFile);
  if (strpos($smbConfFile, "[${section}]") !== false) {
    $regex = "/(\[${section}\])(.|\\n)*(\[)?/m";
    $smbConfFile = preg_replace($regex, "$3", $smbConfFile);
  }
  $command = "echo \"${smbConfFile}\" | sudo tee /etc/samba/smb.conf";
  ssh_commands([
    $command,
    'sudo service smbd restart',
    'sudo service nmbd restart'
  ]);
}

function getSambaConfiguration() {
  $smbConfFile = file_get_contents("/etc/samba/smb.conf");
  $smbConfArray = [];
  $section = '';
  foreach (explode("\n", $smbConfFile) as $line) {
    preg_match('/\[(.*)\]/', $line, $match_section);
    if (!empty($match_section)) {
      $section = $match_section[1];
    }
    preg_match('/\s+(.*) = (.*)/', $line, $match_options);
    if (!empty($match_options)) {
      $smbConfArray[$section][$match_options[1]] = $match_options[2];
    }
  }
  return $smbConfArray;
}

function ssh_commands($commands) {
  $connection = ssh2_connect('localhost', 22);
  ssh2_auth_password($connection, 'vagrant', 'vagrant');
  foreach ($commands as $command) {
    ssh2_exec($connection, $command);
  }
}
?>