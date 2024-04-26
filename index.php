<?php
$url = $_SERVER['REQUEST_URI'];
$url=explode("?", $url);
switch ($url[0]) {
  case '/':
    require 'Home.php';
    break;
  case '/Login':
    require 'admin-login.php';
    break;
  case '/Register':
    require './View/Register.view.php';
    break;
  case '/Forget':
    require 'Forget.php';
    break;
  case '/Home':
    require './View/Home.view.php';
    break;
  case '/Reset':
    require 'Resetform.php';
    break;
  case '/Form':
    require 'Admin-form.php';
    break;
  case '/Logout':
    require 'Log.php';
    break;
  case '/Dash':
    require 'Dashboard.php';
    break;
  default:
    require 'Home.php';
}

