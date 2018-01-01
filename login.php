<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tela de Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!--<script type="text/javascript" src="js/numscroller-1.0.js"></script>-->
<script type="text/javascript" src="jquery.js"></script>
<script>
	$(document).ready(function(){
	$('#button').click(function(){ 	//Ao submeter formulário
		var login = $('#email').val();	//Pega valor do campo email
		var senha = $('#senha').val();	//Pega valor do campo senha
		
		if(login == "" ){
			alert('Digite um Usuário!');
			$("#email").focus();
			return false;
		}
		
		if(senha == "" ){
			alert('Digite uma Senha!');
			$("#senha").focus();
			return false;
		}
		
		$.ajax({			//Função AJAX
			url:"logon.php",			//Arquivo php
			type:"post",				//Método de envio
			data: "email="+login+"&senha="+senha,	//Dados
   			success: function (result){		//Sucesso no AJAX
					//alert(result);
                		if(result == 1){						
                			location.href='pages/index.php'	//Redireciona
                		}else{
                			//$('#errolog').show();		//Informa o erro
							alert('Usuario Invalido!');
                		}
            		}
		});
		return false;	//Evita que a página seja atualizada
	});
});
</script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Faça seu login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuário" name="email" id="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" id="senha" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Lembrar Minha Senha
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" id="button" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
