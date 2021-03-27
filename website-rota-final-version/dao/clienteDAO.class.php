<?php
require_once 'persistence/conexaoBanco.class.php';

 $conexao = null;

class ClienteDAO{

  public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
  }

  public function __destruct(){}


  public function cadastrarAdministradores(){

      $statement = $this->conexao->query("select id from clientes where cpf = '000.000.000-00'");
      $statement = $this->conexao->query("select id from clientes where cpf = '111.111.111-11'");

        if($statement->rowCount() > 0){

            return true;

        }else{

           $statement = $this->conexao->query("alter table clientes auto_increment = 1");

           $statement = $this->conexao->query("insert into clientes(nome,email,cpf,senha,senha_decript,arquivo,descricao,data)
      values('administrador', 'rotasecurit@gmail.com', '000.000.000-00', SHA1('00000000'), '00000000', '-','-','-'),
            ('tecnico', 'tecnico@gmail.com', '111.111.111-11', SHA1(11111111), '11111111', '-','-','-')");

           return false;
   }
  }

  public function cadastrarCliente($cli){

      try {

        $statement = $this->conexao->prepare(
          "insert into clientes(nome,email,cpf,senha,senha_decript,data,arquivo,descricao)
           VALUES(?,?,?,SHA1(?),?,?,?,?)");


        $statement->bindValue(1, $cli->nome);
        $statement->bindValue(2, $cli->email);
        $statement->bindValue(3, $cli->cpf);
        $statement->bindValue(4, $cli->senha);
        $statement->bindValue(5, $cli->senha);
        $statement->bindValue(6, '-');
        $statement->bindValue(7, 'Arquivo indisponível!');
        $statement->bindValue(8, 'Descrição indisponível!');
        $statement->execute();

      } catch (PDOException $e) {
        echo "Erro: ao Cadastrar Clientes!" .$e;
      }
   }

   public function cadastrarImagem($img){

      try {

        $statement = $this->conexao->prepare("insert into imagens(imagem) VALUES(?)");
         $statement->bindValue(1, $img->imagem);
         $statement->execute();

      } catch (PDOException $e) {
          echo "Erro: ao Cadastrar Imagem!".$e;
      }
   }

   public function cadastrarIdImagem(){

      try{

        $statement = $this->conexao->query("select * from imagens");

         if($statement->rowCount() == 0){

              $statement = $this->conexao->query("insert into imagens(imagem) VALUES('-')");
              $statement = $this->conexao->query("update imagens set id_img = 1 where imagem = '-'");

         }else{

        }

      }catch(PDOException $e){
          echo "Erro: ao Cadastrar Id da Imagem!".$e;
      }
   }

   public function cadastrarPostagem($titulo_postagem,$conteudo,$imagem){

      try{

        $statement = $this->conexao->prepare("insert into postagens(titulo_postagem,conteudo,imagem) VALUES(?,?,?)");
        $statement->bindValue(1, $titulo_postagem);
        $statement->bindValue(2, $conteudo);
        $statement->bindValue(3, $imagem);
        $statement->execute();

      }catch(PDOException $e){
          echo "Erro: ao Cadastrar Postagem!".$e;
      }
   }

   public function cadastrarIdPostagem(){

      try{

        $statement = $this->conexao->query("select * from postagens");

        if($statement->rowCount() == 0){

        $statement = $this->conexao->query("insert into postagens(titulo_postagem,conteudo) VALUES('-','-')");
        $statement = $this->conexao->query("update postagens set id_postagem = 1 where titulo_postagem = '-'");

        }else{

        }

      }catch(PDOException $e){
        echo "Erro: ao Cadastrar Id da Postagem!".$e;

      }
   }

   public function buscarCliente(){


   try{

      $statement = $this->conexao->query("show tables");

    if($statement->rowCount() > 0){

       $statement = $this->conexao->query("select * from clientes where id != 1 and id != 2 order by nome;");
       $array = $statement->fetchAll(PDO::FETCH_CLASS,"Cliente");

     }else{
        $array = array();
     }

      return $array;

     }catch(PDOException $e){
       echo "Erro: ao buscar Cliente! ".$e;
     }
   }

   public function buscarImagem(){

      try{

         $statement = $this->conexao->query("show tables like 'imagens'");

         if($statement->rowCount() > 0){
           $statement = $this->conexao->query("select imagem as foto from imagens where id_img != 1");
      	 	 $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

    		 }else{

  			 	  $dados = array();
    		 }

    		  return $dados;

      }catch(PDOException $e){
         echo "Erro: ao buscar Imagens!".$e;
      }
   }

   public function buscarArquivoPorId($id){

      try{

       $statement = $this->conexao->prepare('select arquivo as arq from clientes where id = :id and id != 1 && id != 2');

        $statement->bindValue(":id", $id);
        $statement->execute();
        $array = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $array;

      }catch(PDOException $e){
         echo "Erro: ao buscar Arquivo por ID!". $e;
      }
  }

  public function buscarArquivo(){

        try{

          $statement = $this->conexao->prepare('select arquivo as arq from clientes where id != 1 and id != 2');

           $statement->execute();
           $array = $statement->fetchAll(PDO::FETCH_ASSOC);
           return $array;

        }catch(PDOException $e){
          echo "Erro: ao buscar Arquivo!". $e;
        }
  }

  public function buscarDadosCliente($id){

        try{

          $statement = $this->conexao->prepare('select * from clientes where id = :id');

          $statement->bindValue(":id", $id);
          $statement->execute();
          $array = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");
          return $array;

        }catch(PDOException $e){
          echo "Erro: ao buscar dados do cliente!". $e;
        }
  }

  public function buscarTabelas(){

      try{

        $statement = $this->conexao->prepare("select * from clientes,imagens");
        $statement->execute();

        if($statement->rowCount() > 0){
           $this->deletarTabelas();
           return true;

        }else{

           return false;

        }

      }catch(PDOException $e){
        echo "Erro: ao buscar dados das tabelas!";
      }
  }

  public function buscarPostagem(){

      try{

        $statement = $this->conexao->query("select * from postagens where id_postagem != 1");

        $array = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $array;

      }catch(PDOException $e){
         echo "Erro: ao buscar Postagem!".$e;
      }
  }

  public function buscarPostagemIndiv($id_postagem){

      try{

        $statement = $this->conexao->prepare("select titulo_postagem,conteudo,imagem from postagens where id_postagem = :id");

        $statement->bindValue(":id", $id_postagem);
        $statement->execute();
        $array = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $array;

      }catch(PDOException $e){
         echo "Erro: ao buscar Postagem selecionada!".$e;
      }
  }

  public function buscarPorEmail($email){

      try{

        $statement = $this->conexao->prepare("select id from clientes where email = :e");

        $statement->bindValue(":e", $email);
        $statement->execute();

        if($statement->rowCount() > 0){
         if($email == 'rotasecurit@gmail.com' || $email == 'tecnico@gmail.com'){
            echo "<script>
            alert('login efetuado com sucesso!');
            location.replace('dados.php');
            </script>";
         }else{
            echo "<script>
             location.replace('verificaLogin.php');
            </script>";
        }

          //sessão para entrar no sistema.
          //transformando os dados vindo do banco de dados em um array.
          $dado = $statement->fetch();
          //criando uma sessão.
          session_start();
          $_SESSION['id'] = $dado['id'];
          return true;//logado com sucesso!
        }else{
          return false;//não foi possivél logar no sistema.
        }

      }catch(PDOException $e){
          echo "Erro: ao buscar Registro por E-mail".$e;
      }

  }

  public function verificarTabela($classe,$tabela){

    try{

    $statement = $this->conexao->query("show tables like '$tabela'");

     if($statement->rowCount() > 0){
          $statement = $this->conexao->query("select * from $tabela where id != 1 and id != 2");
          $dados = $statement->fetchAll(PDO::FETCH_CLASS, $classe);

           if(isset($dados) && !empty($dados)){

          }

         }else{
           $dados = array();
            echo "<script>location.replace('attention.php');</script>";
         }

          return $dados;

  }catch(PDOException $e){
      echo "Erro: ao verificar tabelas! ".$e;
  }

}

public function verificarImagem($tabela){

  try{

  $statement = $this->conexao->query("show tables like '$tabela'");

  if($statement->rowCount() > 0){
        $statement = $this->conexao->query("select imagem from $tabela");
        $dados_imagem = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($dados_imagem as $img){
          $caminho = "imagens/";
        if(is_dir($caminho) && file_exists($caminho.$img['imagem'])){

        }else{
           echo "<script>location.replace('attention.php');</script>";
        }
}
       }else{
         $dados_imagem = array();

       }

        return $dados_imagem;

}catch(PDOException $e){
    echo "Erro: ao verificar tabelas! ".$e;
  }
}

   public function deletarCliente($id){

     try{

       $statement = $this->conexao->prepare(
         "delete from clientes where id = :id");

       $statement->bindValue(":id", $id);
       $statement->execute();

     }catch(PDOException $e){
       echo "Erro: ao excluir cliente! ".$e;
  }
}

  public function deletarImagem($imagem){

       try{

          $statement = $this->conexao->prepare(
            "delete from imagens where imagem = :f");

            $statement->bindValue(":f", $imagem);
            $statement->execute();

       }catch(PDOException $e){
          echo "Erro: ao excluir imagem! ".$e;
       }
  }

  public function deletarPostagem($postagem){

        try{

          $statement = $this->conexao->prepare("delete from postagens where titulo_postagem = :tp");
          $statement->bindValue(":tp", $postagem);
          $statement->execute();

        }catch(PDOException $e){
           echo "Erro: ao excluir postagem! ".$e;
        }
  }

  public function deletarTodosOsRegistros(){

     try{

         $statement = $this->conexao->query("delete from clientes where id != 1 and id != 2;");


     }catch(PDOException $e){
       echo "Erro: ao excluir os Registros!";
     }
}

  public function deletarTodasAsImagens(){

      try{

         $statement = $this->conexao->query("show tables like 'imagens'");

          if($statement->rowCount() > 0){

                $statement = $this->conexao->query("delete from imagens");
                $statement = $this->conexao->query("insert into imagens(imagem) values('Imagem indisponível!')");
                $statement = $this->conexao->query("update imagens set id_img = 1");

                echo "<script>location.replace('gerenciar_imagens.php');</script>";

          }else{

          }

      }catch(PDOException $e){
        echo "Erro: ao excluir Imagens!";
      }

}

public function deletarTodasAsPostagens(){

    try{

       $statement = $this->conexao->query("show tables like 'postagens'");

        if($statement->rowCount() > 0){

              $statement = $this->conexao->query("delete from postagens");
              $statement = $this->conexao->query("insert into postagens(titulo_postagem,conteudo,imagem) VALUES('-','-','-')");
              $statement = $this->conexao->query("update postagens set id_postagem = 1 where titulo_postagem = '-'");

              echo "<script>location.replace('gerenciar_postagens.php');</script>";

        }else{

        }

    }catch(PDOException $e){
      echo "Erro: ao excluir Postagens!";
    }

}

  public function deletarTabelas(){

        try{

           $statement = $this->conexao->query("drop table clientes");

        }catch(PDOException $e){
          echo "Erro: ao deletar Tabelas!";
        }
}

  public function reiniciarId(){

        try{

          $statement = $this->conexao->query(
           "alter table clientes auto_increment = 1;");
          $statement = $this->conexao->query(
           "alter table imagens auto_increment = 1;");
          $statement = $this->conexao->query(
           "alter table postagens auto_increment = 1;");

        }catch(PDOException $e){
           echo "Erro: ao resetar chave do registro!".$e;
        }
  }

    public function logar($cpf, $senha){

    		//verifica se o email e senha estão cadastrados.
    		 $statement = $this->conexao->prepare("select id from clientes where cpf = :c and senha = :s");

    		$statement->bindValue(":c", $cpf);
    		$statement->bindValue(":s", sha1($senha));
    		$statement->execute();

    		if($statement->rowCount() > 0){
         if($cpf == '000.000.000-00' && $senha == '00000000' ||
            $cpf == '111.111.111-11' && $senha == '11111111'){
                  //redireciona para fazer uma segunda validação.
                  echo "<script>location.replace('verificaLogin.php');</script>";
         }else{
                  echo "<script>location.replace('area_privada.php');</script>";
        }
    			//sessão para entrar no sistema.
    			//transformando os dados vindo do banco de dados em um array.
    			$dado = $statement->fetch();
    			//criando uma sessão.
    			session_start();
    		    $_SESSION['id'] = $dado['id'];
    			return true;//logado com sucesso!
    		}else{
    			return false;//não foi possivél logar no sistema.
    		}
    	}


      public function buscarClienteIndiv($cpf){

            $statement = $this->conexao->prepare("select from clientes where cpf = :c");

            $statement->bindValue(":c", $cpf);
            $statement->execute();
      }

      public function validarDados($cli){

          $statement = $this->conexao->prepare("select id from clientes where cpf = :c or email = :e");

          $statement->bindValue(":c", $cli->cpf);
          $statement->bindValue(":e", $cli->email);
          $statement->execute();

          if($statement->rowCount() > 0){
             return true;

          }else{
             return false;
          }
      }


      public function recuperarSenha($email, $cpf, $senha){

        //verifica se o email e senha estão cadastrados.
        $statement = $this->conexao->prepare("select senha from clientes where email = :e and id != 1 and id != 2 or cpf = :c and id != 1 and id != 2");
        $statement = $this->conexao->prepare("update clientes set senha = :s where email = :e and id != 1 and id != 2 or cpf = :c and id != 1 and id != 2");

        $statement->bindValue(":e", $email);
        $statement->bindValue(":c", $cpf);
        $statement->bindValue(":s", sha1($senha));
        $statement->execute();
        $this->alterarSenha_decript($email,$cpf);

        if($statement->rowCount() > 0){

          $dado = $statement->fetch();

          return true;

        }else{

          return false;
        }
      }

      public function alterarSenha_decript($email, $cpf){

          $statement = $this->conexao->prepare("update clientes set senha_decript = 'senha original alterada!' where email = :e and id != 1 and id != 2 or cpf = :c and id != 1 and id != 2");

          $statement->bindValue(":e", $email);
          $statement->bindValue(":c", $cpf);
          $statement->execute();

      }

      public function filtrar($filtro, $search){
        try {
          $query = "";
          switch ($filtro) {
            case "nome": $query = "where nome like '%".$search."%'";
            break;
            case "cpf": $query = "where cpf like '%".$search."%'";
            break;
          }

          if(empty($search)){
            $query = "";

          }else if($search == "administrador" || $search == "tecnico"){
              $query = "";
              return;
          }

          $statement = $this->conexao->query("select * from clientes ".$query);
          $array = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");
          return $array;

        } catch (PDOException $e) {
          echo "Erro: ao filtrar! ".$e;

        }
      }

      public function alterar($cli, $id_arq){

              try{

                date_default_timezone_set('America/Sao_Paulo');
                $cli->data = "Última Atualização:\n".date('d/m/Y \-\ H:i');

                $statement  = $this->conexao->prepare('update clientes set arquivo = :n, descricao = :d, data = :dh where id = :i');
                $statement->bindValue(":i",  $id_arq);
                $statement->bindValue(":n",  $cli->nome_arq);
                $statement->bindValue(":d",  $cli->descricao);
                $statement->bindValue(":dh", $cli->data);
                $statement->execute();

              }catch(PDOException $e){
                   echo "Erro: ao mover arquivo!". $e;
              }
      }

      public function alterarImagem($img,$imagem){

              try{

                $statement = $this->conexao->prepare("update imagens set imagem = :i where imagem = :img");

                $statement->bindValue(":img", $imagem);
                $statement->bindValue(":i", $img->imagem);
                $statement->execute();


              }catch(PDOException $e){
                   echo "Erro: ao mover imagem!". $e;
              }
      }

      public function alterarPostagem($id_postagem,$titulo_postagem,$conteudo,$cap_imagem){

              try{

                $statement = $this->conexao->prepare("update postagens set titulo_postagem = :t, conteudo = :c, imagem = :img where id_postagem = :id");

                $statement->bindValue(":t", $titulo_postagem);
                $statement->bindValue(":c", $conteudo);
                $statement->bindValue(":id", $id_postagem);
                $statement->bindValue(":img", $cap_imagem);
                $statement->execute();

              }catch(PDOException $e){
                   echo "Erro: ao alterar postagem!". $e;
              }
      }

      public function selecionar($parametro){

      $statement = $this->conexao->query("select * from clientes where cpf = '$parametro' and cpf != '000.000.000-00' and cpf != '111.111.111-11' or email = '$parametro' and email != 'rotasecurit@gmail.com' and email != 'tecnico@gmail.com'");

      return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  // public function userDetails($uid){
  //
  // try{
  //
  // $statement = $this->conexao->prepare("select email,username,name,google_auth_code FROM users WHERE uid = :id");
  // $statement->bindParam("id", $id, PDO::PARAM_INT);
  // $statement->execute();
  //
  // $data = $statement->fetch(PDO::FETCH_OBJ); //User data
  // return $data;
  // }
  //
  // catch(PDOException $e) {
  //     echo "Erro: ".$e->getMessage();
  //  }
  // }
}
