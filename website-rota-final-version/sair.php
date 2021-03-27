<?php
session_start();
unset($_SESSION['id']);
echo "<script>location.replace('area_cliente.php');</script>";
?>
