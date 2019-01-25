<?php

session_start();
$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if(authenticateFake($login, $password)){
  $_SESSION['auth'] = true;
  header('Location: home.php');
} else {
  header('Location: login.html');
}

function authenticateFake($user, $pass){
  return $login == 'luiz' && $password == '123';
}

// addgroup www-data shadow
// sudo chmod g+x /etc/shadow
function authenticateShadow($user, $pass){
  $shadow = `cat /etc/shadow | grep "^$user\:"`;
  $shadow = explode(":",$shadow);
  return password_verify($pass, $shadow[1]);
}

function authenticateShadow2($user, $pass){
  $shad = preg_split("/[$:]/",`cat /etc/shadow | grep "^$user\:"`);
  $mkps = preg_split("/[$:]/",trim(`mkpasswd -m sha-512 $pass $shad[3]`));
  return ($shad[4] == $mkps[3]);
}

