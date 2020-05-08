  function validarFormContato(){

    var nome = dados.nome.value;
    var tel = dados.tel.value;
    var email = dados.email.value;
    var mensagem = dados.mensagem.value;

    if(nome === "" && tel === "" && email === "" && mensagem === ""){
      alert('Necessário preencher os campos!')
      return false;

    }else if(nome === ""){
      alert('Preencha o campo nome!')
      return false;

    }else if(tel === ""){
      alert('Preencha o campo telefone!')
      return false;

    }else if(tel.length < 15){
        alert('verifique se o campo telefone está correto!')
        return false;

    }else if(email === ""){
      alert('Preencha o campo email!')
      return false;

    }else if(mensagem === ""){
      alert('Preencha o campo mensagem!')
      return false;
   }
      return true;
}

 function validarCadastro(){

    var email = dadosCadastro.emailC.value;
    var cpf = dadosCadastro.cpf.value;
    var senha = dadosCadastro.senha.value;
    var rsenha = dadosCadastro.Rsenha.value;

    if(email === "" && cpf === "" && senha === "" && rsenha === ""){
          alert('Necessário preencher os campos!')
          return false;

    }else if(email === ""){
           alert('email invalído!')
           return false;

    }else if(cpf === "" || cpf.length < 14){
           alert('CPF invalído!')
           return false;

    }else if(rsenha === ""){
           alert('campo repetir senha invalído!')
           return false;

    }else if(senha == rsenha){
            alert('senhas não compatíveis!')
            return false;

     }else if(senha.length && rsenha.length < 8){
          alert('senha invalída!')
          alert('senha muito pequena, \n insira até 8 dígitos!')
            return false;
 }else{
   alert('erro')
 }
}

    function recuperarSenha(){

        var email = recuperarDados.email.value;
        var senha = recuperarDados.senha.value;
        var senha_c = recuperarDados.senha_c.value;

        if(email === "" && senha === "" && senha_c === ""){
          alert('Necessário preencher os campos!')
          return false;

        }

    }
