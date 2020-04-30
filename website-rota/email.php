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

 }else{

$to = "lucasmatoss2000@gmail.com";
$subject = "Rota-Security - ".$assunto;
$body = "Nome:  ".$nome. "\r\n".
        "Telefone:".$telefone. "\r\n".
        "Email: ".$email. "\r\n".
        "Mensagem:\r\n".$mensagem;

$header = "From:lucasmatoss2000@gmail.com"."\r\n".
          "Replay-To:".$email."\r\n".
          "X=Mailer:PHP/".phpversion();

if(mail($to,$subject,$body,$header)){

    echo "<script>alert('email enviado com sucesso! Obrigado Por nos contatar.');</script>";

}else{
    echo "<script>alert('Erro ao enviar email! Por favor tente mais tarde.');</script>";

  }
 }
}
 ?>
