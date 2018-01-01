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
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cantinho da Julia</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
	#nav{
		font-size: 40px;
		text-align: center;
		font-family: new times roman;
		color: red;
	}
</style>
<body onload="loadDoc(); document.getElementById('fat').style.display = 'none';">
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
                            <a href="#" id="rev"><i class="fa fa-database fa-fw"></i>Estoque<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" id="fat">
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
							<a href="faturamento.php" id="fatu"><i class="fa fa-table fa-fw"></i>Faturamento</a>
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
                    <h1 class="page-header" style="text-align: center; ">Faturamento</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<style>
	#head{
		background-color: blue;
		color: white;
		text-align: center;
	}
</style>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"id="head">
                            <b>Mercadorias</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body"  id="demo"></div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<!-- row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<script>
function loadDoc(){
        $.ajax({url: "table.php", success: function(result){
            //alert(result);
			$("#demo").html(result);
        }});

}
</script>


<script>
function teste(id,str) { 
	//alert("TESTE");
  var id = id;
  var action = str;
  var codigo = document.getElementById("codigo_"+id).value;
  var qtd = document.getElementById("qtd_"+id).value;
  var unidade = document.getElementById("unidade_"+id).value;
  var desc = document.getElementById("desc_"+id).value;
  var custo = document.getElementById("custo_"+id).value; 
  var venda = document.getElementById("venda_"+id).value;   
    $.ajax({			//Função AJAX
			url:"update.php",			//Arquivo php
			type:"post",				//Método de envio
			data: {
				action: action,
				id: id,
				codigo: codigo,
				qtd: qtd,
				unidade: unidade,
				desc: desc,
				custo: custo,
				venda: venda
			},
   			success: function (result){
				//Sucesso no AJAX
				//alert(result);
				$("#result").html(result);
				loadDoc();
			}
		});
/*
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").inner =
      this.responseText;
    }
  };
  xhttp.open("POST", "update.php?action="+action+"&id="+id+"&codigo="+codigo+"&qtd="+qtd+"&unidade="+unidade+"&desc="+desc+"&custo="+custo+"&venda="+venda, true);
  
  //alert("update.php?action="+action+"&id="+id+"&codigo="+codigo+"&qtd="+qtd+"&unidade="+unidade+"&desc="+desc+"&custo="+custo);
  xhttp.send();
*/
}
</script>

 <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../jquery.js"></script>
	<script>
	function myFunction() {
		 var r = confirm("Desja atualizar os valores?");
		if (r == true) {
			return true;
		} else {
			return exit;
		}
	}	
</script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	 <script>
$(function() {
	$('#rev').click(function(){
		//alert('T');
		$('#fat').toggle("fast");
		return false;
	});
	
	$('#fatu').click(function(){
		//alert('T');
		$('#fat').hide("fast");
		return false;
	});
});
</script>
</body>
</html>
