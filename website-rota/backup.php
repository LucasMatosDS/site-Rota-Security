<?php
if(isset($_GET['backup'])){
  include_once 'dao/clienteDAO.class.php';
  $cliDAO = new ClienteDAO();
  $cliDAO->backup();
  header('location: dados.php');
}
 ?>
