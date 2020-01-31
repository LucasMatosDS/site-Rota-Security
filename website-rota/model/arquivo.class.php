<?php

class Arquivo{

    private $id_arq;
	private $nome_arq;
	private $descricao;

	 public function __construct(){}
     public function __destruct(){}

     public function __get($a){ return $this->$a;}
     public function __set($a, $v){$this->$a = $v;}

     public function __toString(){
        return nl2br("
                     Código: $this->id_arq
                     Nome Arquivo: $this->nome_arq
                     Descricao: $this->descricao");
     }
	
}