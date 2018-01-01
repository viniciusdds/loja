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

</head>

<body onload="loadDoc();">
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
            <div class="navbar-header" style="background-color: #FFF0F5">
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
							<a href="faturamento.php"><i class="fa fa-table fa-fw"></i>Faturamento</a>
						</li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<style>
	#pesq:hover{
		background-color: #696969;
	}
	
	#pesq{
		height: 35px; 
		background-color: #1E90FF; 
		color: white;
	}
	
	.ui-datepicker-prev ui-corner-all:after{
		z-index:10000;
		color:black;
		position:absolute;
		left:9px;
		top:4px;
		content: "<";
	}
	
	#exp::before{
		content: "Exportar ";
	}
</style>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Histórico</h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<style>
	#head{
		text-align: center;
		background-color: blue;
		color: white;
	}
</style>
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
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "estoque.php", true);
  xhttp.send();
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
   
	
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	
	<link rel="stylesheet" href="../date.css" />
	<script src="../js/jquery-datepicker.js"></script>
	<script src="../js/jquery-datepicker-ui.js"></script>
	<script>
	$(function() {
		$('#datepicker').datepicker({dateFormat: 'yy-mm-dd'});
		$('#datepicker1').datepicker({dateFormat: 'yy-mm-dd'});
	});
 
  </script>
  <script>
$(function() {
	$('#rev').click(function(){
		//alert('T');
		$('#fat').toggle("fast");
		return false;
	});
});
</script>

</body>

</html>
