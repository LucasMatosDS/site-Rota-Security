<?php
session_start();

   if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
          unset($_SESSION['msg']);
   }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<style>
 input{
   display: block;
   margin: 4px;
 }

 button{
   margin: 10px;
   padding: 10px;
   border: 2px solid black;
   border-radius: 4px;
 }

 a{
   text-decoration: none;
   color: black;
   font-size: 15px;
 }
</style>

    <h3>Restaurar base de dados</h3>

     <form method="post" action="./processo.php" enctype="multipart/form-data">
       <label>Servidor:</label>
       <input type="text" name="servidor">
       <label>Usuario:</label>
       <input type="text" name="usuario_server">
       <label>Senha:</label>
       <input type="password" name="senha_server">
       <label>Base de Dados:</label>
       <input type="text" name="db_name">
       <label>Backup</label>
       <input type="file" name="arquivo" accept=".sql,.zip">
       <button type="submit"><a>importar</a></button>
     </form>
  </body>
</html>
