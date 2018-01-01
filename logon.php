<?php			
  @mysql_connect('localhost', 'root','')or die('<h1>Erro no Servidor!</h1>');	//Conecta com o MySQL
  @mysql_select_db('controle') or die('<h1>Erro no Banco!</h1>');	 //Seleciona banco de dados
  
  $login = @$_POST['email'];	//Pegando dados passados por AJAX
  $senha = @$_POST['senha'];
  
  //print_r($_POST);
  
  //Consulta no banco de dados
  $sql="select * from controle.usuarios where nome='".$login."' and senha='".$senha."'"; 
  $resultados = @mysql_query($sql)or die (@mysql_error());
  $res = @mysql_fetch_array($resultados); //
	if (@mysql_num_rows($resultados) == 0){
		echo 0;	//Se a consulta não retornar nada é porque as credenciais estão erradas
	}
	
	else{
		echo 1;	//Responde sucesso
		if(!isset($_SESSION)) 	//verifica se há sessão aberta
		session_start();		//Inicia seção
		//Abrindo seções
		$_SESSION['usuarioID']=$res['id']; 		
		$_SESSION['nomeUsuario']=$res['nome'];
		$_SESSION['email']=$res['senha'];	
		exit;	
	}
?>