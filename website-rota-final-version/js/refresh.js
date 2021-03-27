$(function(){
  $("#pesquisa").keyup(function(){
    //Recuperar o valor do campo
    var pesquisa = $(this).val();

    //Verificar se há algo digitado
    if(pesquisa != ''){
      var dados = {
        palavra : pesquisa
      }
      $.post('pesquisa.php', dados, function(retorna){
        //Mostra dentro de um elemento html os resultado obtidos
        $(".resultado").html(retorna);
      });
    }
  });
});
