<?php
//senha db: 7&N$D6C8\K~_D<Gl
class ConexaoBanco extends PDO {

private static $instance = null;

public function __construct($dsn, $user, $pass){
  parent::__construct($dsn,$user,$pass);
}

public static function getInstance(){

    try{

      if(!isset(self::$instance)){
        self::$instance = new ConexaoBanco("mysql:dbname=rota;host=localhost","root","");
//        self::$instance = new ConexaoBanco("mysql:dbname=epiz_27287140_rotateste;host=sql307.epizy.com;port=3306
//","epiz_27287140","ipcxJiBhxU");
      }
      return self::$instance;

    }catch(PDOException $e){

      echo "Erro ao conectar. ".$e;
    }
 }
}
