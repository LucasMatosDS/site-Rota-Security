<?php
session_start();

include_once 'vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';

$ga = new GoogleAuthenticator();

if(!isset($_SESSION['auth_secret'])){
  echo "<script>location.replace('index.php');</script>";
}

$checkResult = $ga->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance

if(!$checkResult){
    $_SESSION['failed'] = true;
    echo "<script>location.replace('verificaLogin.php');</script>";
}else{
    echo "<script>location.replace('dados.php');</script>";
}
