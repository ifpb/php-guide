<?php

session_start();
$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if($login == 'luiz' && $password == '123'){
  $_SESSION['auth'] = true;
  header('Location: home.php');
} else {
  header('Location: login.html');
}
