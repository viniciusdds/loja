<?php
	session_start(); 	//A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {		//Verifica se há seções
			//session_destroy();						//Destroi a seção por segurança
			header("Location: ../login.php"); exit;	//Redireciona o visitante para login
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cantinho da Julia</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/numscroller-1.0.js"></script>
<script type="text/javascript" src="../jquery.js"></script>
<script>
	$(document).ready(function(){
	$('#cadastro').click(function(){ 	//Ao submeter formulário
		var codigo = $('#codigo').val();	//Pega valor do campo codigo
		var qtd = $('#qtd').val();	//Pega valor do campo quantidade
		var unidade = $('#unidade').val();	//Pega valor do campo unidade
		var desc = $('#desc').val();	//Pega valor do campo descrição
		var custo = $('#custo').val();	//Pega valor do campo custo
		var venda = $('#venda').val();	//Pega valor do campo custo
		
		if(codigo == "" || isNaN(codigo)){
			alert('Digite um Código com apenas número!');
			$("#codigo").focus();
			return false;
		}
		
		if(qtd == "" ){
			alert('Selecione uma Quantidade!');
			$("#qtd").focus();
			return false;
		}
		
		if(unidade == "" ){
			alert('Selecione uma Unidade!');
			$("#unidade").focus();
			return false;
		}
		
		if(desc == "" ){
			alert('Digite a Descrição do Produto!');
			$("#desc").focus();
			return false;
		}
		
		if(custo == "" || isNaN(custo)){
			alert('Digite um Custo com apenas números!');
			$("#custo").focus();
			return false;
		}
		
		if(venda == "" || isNaN(venda)){
			alert('Digite um Venda com apenas números!');
			$("#venda").focus();
			return false;
		}
		
		$.ajax({			//Função AJAX
			url:"cadastro.php",			//Arquivo php
			type:"post",				//Método de envio
			data: "codigo="+codigo+"&qtd="+qtd+"&unidade="+unidade+"&desc="+desc+"&custo="+custo+"&venda="+venda,	//Dados
   			success: function (result){		//Sucesso no AJAX
					//alert(result);
                		if(result == 1){						
                			alert('Cadastrado com Sucesso!');	//Redireciona
							$("input[type=text]").val('');
							$('input[type=number]').val('');
                		}else{
                			//$('#errolog').show();		//Informa o erro
							alert('Código já Cadastrado!');
							$("#codigo").focus();
                		}
            		}
		});
		return false;	//Evita que a página seja atualizada
	});
});
</script>

</head>

<body>
<style>
	#nav{
		font-size: 40px;
		text-align: center;
		font-family: new times roman;
		color: red;
	}
</style>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #FFF0F5">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a class="navbar-brand" href="index.php" id="nav"><b>Cantinho da Julia</b></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-database fa-fw"></i>Estoque<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="entrada.php">Entrada</a>
                                </li>
                                <li>
                                    <a href="saida.php">Saída</a>
                                </li>
								<li>
                                    <a href="historico.php">Histórico</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
							<a href="faturamento.php"><i class="fa fa-table fa-fw"></i>Faturamento</a>
						</li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">Cadastrar Itens de Estoque</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<style>
	#head{
		text-align: center;
		background-color: blue;
		color: white
	}
</style>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="head">
                            <b>Entrada de Mercadoria</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<table border="0" width="100%">
                                <tr>
									<td width="15%">Código do Produto:</td>
									<td><input type="text" class="form-control" id="codigo" name="codigo" placeholder="Digite o código" style="width: 50%"></td>
									<td width="15%">Quantidade:</td>
									<td><input type="number" class="form-control" id="qtd" name="qtd" style="width: 25%"></td>
								</tr>
								<tr>
									<td><br></td>
								</tr>
								<tr>
									<td width="15%">Unidades:</td>
									<td><input type="number" class="form-control" id="unidade" name="unidade" style="width: 25%"></td>
									<td width="15%">Descrição do Produto:</td>
									<td><input type="text" class="form-control" id="desc" name="desc" placeholder="Digite a descrição" style="width: 55%"></td>
								</tr>
								<tr>
									<td><br></td>
								</tr>
								<tr>
									<td width="15%">Valor da Mercadoria:</td>
									<td><input type="text" class="form-control" id="custo" name="custo" placeholder="Digite o valor do custo" style="width: 50%"></td>
									<td width="15%">Valor da Venda:</td>
									<td><input type="text" class="form-control" id="venda" name="venda" placeholder="Digite o valor da venda" style="width: 50%"></td>
								</tr>
								<tr>
									<td><br></td>
								</tr>
								<tr>
									<td colspan="4" align="center"><input type="submit" id="cadastro" class="btn btn-primary btn-lg" value="Cadastrar Produto" /></center></td>
								</tr>
							</table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
