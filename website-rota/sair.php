<?php

session_start();
unset($_SESSION['id']);
header('location: area_cliente.php');

 ?>
