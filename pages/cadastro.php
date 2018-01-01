<?php
	session_start(); 	//A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {		//Verifica se há seções
			//session_destroy();						//Destroi a seção por segurança
			header("Location: ../login.php"); exit;	//Redireciona o visitante para login
	}
	
	@mysql_connect('localhost', 'root','')or die('<h1>Erro no Servidor!</h1>');	//Conecta com o MySQL
	@mysql_select_db('controle') or die('<h1>Erro no Banco!</h1>');	
	
	$codigo  = @$_POST['codigo'];
	$qtd     = @$_POST['qtd'];
	$unidade = @$_POST['unidade'];
	$desc    = @$_POST['desc'];
	$custo   = @$_POST['custo'];
	$venda   = @$_POST['venda'];
	
	//print_r($_POST);
	$query = @mysql_query("select * from registro.consult where codigo = '$codigo'") or die('erro1');
	$r = @mysql_num_rows($query);
	
	if($r == 0){
		$sql = @mysql_query("insert into controle.entrada (codigo,qtd,unidade,descricao,custo,venda) values ('$codigo','$qtd','$unidade','$desc','$custo','$venda')") or die('erro2');
		$sql = @mysql_query("insert into controle.estoque (codigo,qtd,unidade,descricao,custo,venda) values ('$codigo','$qtd','$unidade','$desc','$custo','$venda')") or die('erro3');
		echo 1;
	}else{
		echo 0;
	}
?>