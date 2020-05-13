<?php
include_once 'dao/clienteDAO.class.php';
include_once 'model/cliente.class.php';
$cliDAO = new ClienteDAO();
$cli = new Cliente();
$id = $_GET['id'];
$array = $cliDAO->buscarArquivo($id);
chdir( 'arquivos/' );
$caminho = "arquivos/";
$arquivos = glob("{*.pdf,*docx}", GLOB_BRACE);
foreach($arquivos as $cli){

		?>
		<a href="arquivos/<?php echo $cli?>"><?php echo "$cli tamanho ".filesize($cli). " bytes";?></a><br>
		<?php
}
