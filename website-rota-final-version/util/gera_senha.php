<?php
class geraSenha{
public function geraS($tamanho = 8, $maiusculas = true, $numeros = true){
          // Caracteres de cada tipo
          $letraMi = 'abcdefghijklmnopqrstuvwxyz';
          $letraMa = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $numero = '1234567890';
          // Variáveis internas
          $retorno = '';
          $caracteres = '';
          // Agrupamos todos os caracteres que poderão ser utilizados
          $caracteres .= $letraMi;
          if ($maiusculas) $caracteres .= $letraMa;
          if ($numeros) $caracteres .= $numero;

          // Calculamos o total de caracteres possíveis
          $len = strlen($caracteres);
          for ($n = 1; $n <= $tamanho; $n++) {
          // Criamos um número aleatório de 1 até $len para pegar um dos caracteres
          $rand = mt_rand(1, $len);
          // Concatenamos um dos caracteres na variável $retorno
          $retorno .= $caracteres[$rand-1];
          }
          return $retorno;
          }
}