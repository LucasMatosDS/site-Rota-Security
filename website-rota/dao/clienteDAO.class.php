<?php
require_once 'persistence/conexaoBanco.class.php';

 $conexao = null;

class ClienteDAO{

  private $pdo;

  public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
  }

  public function __destruct(){}


    public function conectar($n, $h, $u, $s){

   		global $pdo;

   		try{

   		$pdo = new PDO("mysql:dbname=".$n.";host=".$h,$u,$s);

   	 }catch(PDOException $e){
   	echo "Erro: erro ao conectar a Base de Dados!";
   	 }
   	}

  public function cadastrarCliente($cli){

      try {

          $statement = $this->conexao->prepare("select id from clientes where cpf = :c");

          $statement->bindValue(":c", $cli->cpf);
          $statement->execute();

         if($statement->rowCount() < 0){

              return false;

         }else{

        $statement = $this->conexao->prepare(
          "insert into clientes(nome,email,cpf,senha,senha_decript)
           VALUES(?,?,?,MD5(?),?)");

        $statement->bindValue(1, $cli->nome);
        $statement->bindValue(2, $cli->email);
        $statement->bindValue(3, $cli->cpf);
        $statement->bindValue(4, $cli->senha);
        $statement->bindValue(5, $cli->senha);

        $statement->execute();

        return true;
      }

      } catch (PDOException $e) {
        echo "Erro ao Cadastrar Clientes!" .$e;
      }
   }

   public function buscarCliente(){

     try{

       $statement = $this->conexao->query("select * from clientes;");
       $statement = $this->conexao->query("select * from clientes where id != 1 and id != 2 order by nome;");
       $array = $statement->fetchAll(PDO::FETCH_CLASS,"Cliente");
       return $array;

     }catch(PDOException $e){
       echo "Erro ao buscar Cliente! ".$e;
     }
   }

   public function buscarUsuarioAdm(){

        try{

          $result = $statement = $this->conexao->query("select nome from clientes where id = 1");

          if($result == 1){

          $result = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");
          return $result;

        }

        }catch(PDOException $e){
            echo "Erro ao buscar usuário!".$e;
        }
   }

   public function buscarUsuarioTec(){

        try{

          $result = $statement = $this->conexao->query("select nome from clientes where id < 3 and id > 1");
          $result = $statement->fetchAll(PDO::FETCH_CLASS, "Cliente");
          return $result;

        }catch(PDOException $e){
            echo "Erro ao buscar usuário!".$e;
        }
   }

   public function consultar_cpf($cpf){

        try{

          echo $_SERVER['REQUEST_METHOD'];

           $statement = $this->conexao->prepare("select * from clientes where cpf = :c");
           $statement->execute(array(':c' => $cpf));
           $array = $statement->fetchAll();

           return $array;

         }catch(PDOException $e){
             echo "Erro ao buscar registros!".$e;
         }
       }

   public function deletarCliente($cpf){

     try{

       $statement = $this->conexao->prepare(
         "delete from clientes where cpf = :c");

       $statement->bindValue(':c', $cpf);
       $statement->execute();

     }catch(PDOException $e){
       echo "Erro ao excluir cliente! ".$e;
  }
}

public function deletarTodosOsRegistros(){

     try{

         $statement = $this->conexao->prepare("delete from clientes where id != 1 and id != 2;");
         $statement->execute();

     }catch(PDOException $e){
       echo "Erro ao excluir os Registros!";
     }
}

  public function reiniciarId(){

        try{

          $statement = $this->conexao->prepare(
           "alter table clientes auto_increment = 1;");
          $statement->execute();

        }catch(PDOException $e){
           echo "Erro ao resetar chave do registro!".$e;
        }
  }

  public function backup(){

      try{

        $statement = $this->conexao->prepare('');
        $statement->execute();

      }catch(PDOException $e){
          echo "Erro ao executar Backup!".$e;
      }

  }

    public function logar($cpf, $senha){

          global $pdo;

    		//verifica se o email e senha estão cadastrados.
    		$statement = $pdo->prepare("select id from clientes where cpf = :c and senha = :s");

    		$statement->bindValue(":c", $cpf);
    		$statement->bindValue(":s", md5($senha));
    		$statement->execute();

    		if($statement->rowCount() > 0){

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
}
