<?php
session_start(); 	//A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {		//Verifica se há seções
			//session_destroy();						//Destroi a seção por segurança
			header("Location: ../login.php"); exit;	//Redireciona o visitante para login
	}
	
$funcao = @$_REQUEST["action"];

@call_user_func($funcao);

function alterar_MO() {
@mysql_connect('localhost', 'root','')or die('<h1>Erro no Servidor!</h1>');	//Conecta com o MySQL
@mysql_select_db('controle') or die('<h1>Erro no Banco!</h1>');	
	//$app		 = "configBalança";
	//$action		 = "update";
	//$user 		 = $_COOKIE["Usuario"];
	$codigo  = @$_REQUEST['codigo'];
	$qtd 	 = @$_REQUEST['qtd'];
	$unidade = @$_REQUEST['unidade'];
	$desc    = @$_REQUEST['desc'];
	$custo   = @$_REQUEST['custo'];
	$venda   = @$_REQUEST['venda'];
	$time = date('Y-m-d H:i:s');
	
	$sql = "select * from controle.entrada where codigo = '$codigo'";
  	$sql = @mysql_query($sql) or die("Erro no SQL: ".mysql_error());
	
	if (@mysql_num_rows($sql) > 0) {
	$sql = @mysql_query("INSERT into controle.entrada (codigo, qtd, unidade, descricao, custo, venda, data) values ('$codigo','$qtd','$unidade', '$desc', '$custo', '$venda', CURRENT_TIMESTAMP() ) on DUPLICATE KEY UPDATE qtd = '$qtd' , unidade =  '$unidade', descricao = '$desc', custo = '$custo', venda = '$venda', data = CURRENT_TIMESTAMP() ");
	}
}	
?>