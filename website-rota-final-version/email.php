<script type="text/javascript">
   window.setTimeout("location.href='./contato.php'",1000)
</script>

<?php

if(isset($_POST['email']) && !empty($_POST['email'])){

$nome = $_POST['nome'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$assunto =  $_POST['assunto'];
$mensagem = $_POST['mensagem'];

 if(empty($nome) && empty($tel) && empty($email) && empty($mensagem)){
   echo "<script>alert('há campos vazios, Preencha novamente!')</script>";

 }else if(filter_var($email, FILTER_VALIDATE_EMAIL)){

$to = "rotasecurit@gmail.com";
//$to = "lucasmatoss2000@gmail.com";
$subject = "Rota-Security - ".$assunto;
$body =    "<h3>Nome:  ".$nome. "</h3>\r\n".
           "<h3>Telefone: ".$telefone. "</h3>\r\n".
           "<h3>Email: ".$email. "</h3>\r\n".
           "<h3>Mensagem:<br>".$mensagem."</h3>";

$header = "From:".$email."\r\n".
          "Replay-To:".$email."\r\n".
          "Content-type: text/html; charset=iso-8859-1;"."\r\n".
          "MIME-version: 1.0\r\n";
          "X=Mailer:PHP/".phpversion();

if(mail($to,$subject,$body,$header)){

    echo "<script>alert('E-mail enviado com sucesso! Obrigado Por nos contatar.');</script>";

}else{
    echo "<script>alert('Ops problemas ao enviar E-mail! Por favor tente mais tarde.');</script>";

  }
  }else{
    echo "<script>alert('E-mail inválido!')</script>";
  }
 }
 ?>
