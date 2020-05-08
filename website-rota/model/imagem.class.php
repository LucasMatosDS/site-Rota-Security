<?php
class Imagem{

   private $id_img;
   private $imagem;

   public function __construct(){}
   public function __destruct(){}

     public function __get($a){ return $this->$a;}
     public function __set($a, $v){$this->$a = $v;}

     public function __toString(){
        return nl2br("Id Imagem: $this->id_img
                      Imagem: $this->imagem");
     }
}
