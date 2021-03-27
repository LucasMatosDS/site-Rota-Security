<?php
if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
}else if(session_status() !== PHP_SESSION_NONE){
        //echo "sessãos habilitadas! mas nenhuma existe..";
}else if(session_status() !== PHP_SESSION_DISABLED){
    //echo "sessões desabilitadas.";    
}else{
    //echo "sessão habilitada.";
}

include_once 'dao/clienteDAO.class.php';
include_once 'model/cliente.class.php';
include_once 'util/padronizacao.class.php';
$cli = new Cliente();
$p = new Padronizacao();

$cliDAO = new ClienteDAO();
$cli = new Cliente();
$array = $cliDAO->buscarCliente();
?>
<p style="color: red; font-weight: bold;"><?php echo "Número de Registros: ".count($array);?></p>
<p style="float: right; color: red; font-weight: bold; text-align: right;">PHP version: <?php echo phpversion();?><br>Executando em: <?php echo PHP_OS;?>
  <?php

         if(isset($_SESSION['auth_secret']) ||
        isset($_SESSION['id'])){
          echo "<p style='color: green; font-weight: bold;'>Login Aprovado!</p>";

        //valida o id para informar qual usuário acessou o sistema.
            if($_SESSION['id'] == 1){
               echo "<br><p style='float: right; color: red; font-weight: bold; text-align: right;'>Bem-vindo usuário Administrador.<br></p>";

            }else if($_SESSION['id'] == 2){
               echo "<br><p style='float: right; color: red; font-weight: bold; text-align: right;'>Bem-vindo usuário Técnico.<br></p>";
            }else{

           if(isset($_SESSION['auth_secret'])){
            echo "<br><p style='float: right; color: red; font-weight: bold; text-align: right;'>Login efetuado via QR Code.<br>Cod login:".$_SESSION['auth_secret']."</p>";
          }
        }

     }else{
          echo "<script>location.replace('index.php');</script>";
     }
    ?>
  </p>
<table id="tabela" class="table table-dark table-bordered table-hover table-condensed">
  <thead align="center">
<tr>
<th scope="col">Ações</th>
<th scope="col">Nome</th>
<th scope="col">E-mail</th>
<th scope="col">CPF</th>
<th scope="col">Arquivo</th>
<th scope="col">Descrição</th>
<th scope="col">Status</th>
</tr>
</thead>
<tbody>

<?php
    foreach($array as $cli){
      echo "";
      $dados = $cliDAO->buscarArquivoPorId($cli->id);
       foreach($dados as $row){
          $caminho = "arquivos";
          //$pasta = $caminho."/".$cli->nome."/";
            $pasta = $caminho."/".$cli->nome."-".$cli->id."/";


      echo "<tr>
      <ul>
        <td align='center'><li class='m-2' id='tab-line'><a href='$pasta$row[arq]' download title='Baixar Arquivo' class='btn border border-light text-dark' style='background: silver'><img src='img/download.png'></a></li>
        <li class='m-2' id='tab-line'><a href='alterar_arquivo.php?id=".$cli->id."&arq=".$p->base64_url_encode($row['arq'])."&cli=".$cli->nome."' class='btn btn-light border border-light text-dark btn-deletar'><img src='img/edite.png' title='Editar'></a></li>
        <li class='m-2' id='tab-line'><a href='excluir.php?id=".$cli->id."&arq=".$row['arq']."' class='btn btn-danger border border-light text-dark btn-deletar' onclick='return verificarExclusaoPeloIDeDOC()' title='Excluir Registro'><img src='img/trash.svg'></a></li></td>
        ";
        echo "<td>$cli->nome</td>";
        echo "<td>$cli->email</td>";
        echo "<td>$cli->cpf</td>";
        if(is_dir($pasta)){
        if(file_exists($pasta.$row['arq'])){
           echo "<td><a class='text-danger' title='Baixar Arquivo recente' style='text-style: bold; font-weight: bold;' href='$pasta$row[arq]' download>$row[arq]</a><br>
            <a class='btn btn-danger' style='text-style: bold; font-weight: bold;' href='$pasta'>Visualizar Todos os Arquivos.</a></td>";
        }else{
           echo "<td class='text-danger'>Arquivo indisponível,<br>Arquivo não existe na pasta <strong class='text-light'>$pasta.</strong>";
           //verifica se a pasta está vazia.
           if(count(glob("$pasta/*")) === 0){

           }else{
             echo "<a class='btn btn-danger' style='text-style: bold; font-weight: bold;' href='$pasta'>Visualizar Todos os Arquivos.</a></td>";
           }
        }

      }else{
        echo "<td class='text-danger'>diretório <strong class='text-light'>$pasta</strong><br>não existe.</td>";
      }
        echo "<td>$cli->descricao</td>";
        echo "<td>$cli->data</td>";
        echo "</ul>";
      echo "</tr>";
   }
  }
 ?>
</tbody>
</table>
