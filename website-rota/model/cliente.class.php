<?php

 class Cliente{

    private $id;
    private $nome;
    private $email;
    private $cpf;
    private $senha;
    private $data;

     public function __construct(){}
     public function __destruct(){}

     public function __get($a){ return $this->$a;}
     public function __set($a, $v){$this->$a = $v;}

     public function __toString(){
        return nl2br("
                     Código: $this->id
                     Nome: $this->nome
                     E-mail: $this->email
                     CPF: $this->cpf
                     Senha: $this->senha
                     Data: $this->data");
     }
 }
