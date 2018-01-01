<?php
session_start();
	include "conecta1.php";
if(!isset($_SESSION['usuario'])){ //Verifica se o usuario e senha são verdadeiros
	header("location: index.php"); //Caso o usuario e senha for falso, redirecionará para a página index.php, ou seja, a página de login
	exit;}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Configuracao Balanca</title>
<?php include "Includes/MWGrid.php" ?>
<link rel="stylesheet" type="text/css" href="css/merweb.css" />
	<link href="../Library/bootstrap/css/bootstrap.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="bootstrap/js/html5shiv.js"></script>
	<script src="bootstrap/js/respond.min.js"></script>

	<![endif]-->
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<style>
	.btn {
		width: 100px;
		height: 50px;
		display: inline-block;
		padding: 6px 12px;
		margin-bottom: 0;
		font-size: 14px;
		font-weight: 400;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
	}
#myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}
	.modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
    }
    .modal-content {
        margin: auto;
        display: block;
        width: auto;
        height: auto;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;

        max-width: 200px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }@keyframes zoom {
         from {transform:scale(0)}
         to {transform:scale(1)}
     }

    /* The Close Button */
    .close2 {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close2:hover,
    .close2:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }


</style>
<script type='text/javascript'>


function exportar(){
	var action = "exportar";
	var mo = $('#order').val();
	//alert(mo);
	
	window.open("excel.php?action="+action+"&mo="+mo, "_blank");
	
/*var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("conteudo").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","excel.php?action="+action+"&mo="+mo,true);
	xmlhttp.send();*/
}


function pesquisa(strOpc){
	var action = strOpc;
	var pesq = document.getElementById("pesq").value;
	var busca = $('#search_field').val();

	if (busca == null ) {
		busca = '';
	} else {
		action = 'pesquisar_MO';
	}

	

	$.ajax({
		type:"POST",
		data: {action:action,pesq:pesq,busca:busca},
		url: "mo_function2.php",
		success: function(data)
		{
			//alert(data);

			$("#conteudo").html(data);

		}
	});
	return false;
}


function validaForm(id,strOpc){
	var id = id;
	var action = strOpc;
	var component = document.getElementById("component_"+id).value;
	var peso = document.getElementById("peso_"+id).value;
	var pesq = document.getElementById("mo_"+id).value;
	$.ajax({
		type:"POST",
		data: {action:action,id:id,component:component,peso:peso,pesq:pesq},
		url: "mo_function2.php",
		success: function(data)
		{
			$("#conteudo").html(data);
		}
	});
	return false;
}
function maiuscula(z){
	v = z.value.toUpperCase();
	z.value = v;
}
function SomenteNumero(e){
	var tecla=(window.event)?event.keyCode:e.which;
	if((tecla>47 && tecla<58)) return true;
	else{
		if (tecla==8 || tecla==0) return true;
		else  return false;
	}
}
	

		
</script>
</head>
<body OnLoad="document.frm_pesq.pesq.focus();display_dados();">







<div align="right" style="background-color: lightgrey; padding: 10px">

      	<form name="frm_pesq" method="post" action="<?php echo $PHP_SELF ?>">
		<label><b>Digite a MO: </b></label>
		<input type="text" name="pesq" id="pesq" size="25" style="border:1px solid; background-color:white;" onkeyup="maiuscula(this)" >
        <input type="submit" name="pesquisar" value="Pesquisar" onClick="return pesquisa('pesquisar_MO')"  class="btn btn-primary" style="height: 40px"  />
      </form>
</div>


<div id="conteudo"><div align="center"><br/><img src="img/balanca.jpg"/></div></div>
</td></tr>
</table>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        modalImg.alt = this.alt;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close2")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("myModal").style.display = "block";
    }
	function teste1() {
	$('#myModal').hide();
}
</script>

</body>
</html>
