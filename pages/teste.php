<?php

	
	

$funcao = @$_REQUEST["action"];

    @call_user_func($funcao);



function pesquisar_MO() {

	@mysql_connect('localhost', 'root','')or die('<h1>Erro no Servidor!</h1>');	//Conecta com o MySQL
	@mysql_select_db('controle') or die('<h1>Erro no Banco!</h1>');	
	
	
	$busca = $_REQUEST['busca'];
	$pesq = $_REQUEST['pesq'];

	//echo $busca." ".$pesq; 
	
	
################# QUERY PARA MOSTRAR A TABELA ####################

	$sql = @mysql_query("select * from controle.entrada");
			
	$row = @mysql_num_rows($sql);	
	if($row > 0) {




$linha = @mysql_fetch_row($sql);

$familia = $linha[0];
$familia2 = $linha[6];?>
<script>
	function exp() {
     var r = confirm("Desja exportar essa MO?");
    if (r == true) {
        return true;
    } else {
        return exit;
    }
}
</script>
<?php
	$total = @mysql_num_rows($sql);

	@mysql_data_seek($sql,0);
	
	echo "<table width='100%' class='table table-bordered'>

			<tr>
			<td colspan='3' align='center' width='50%'><b>PESO</b>&nbsp;&nbsp;&nbsp;<input type='text' style='width: 80px;background-color:#ff8080; border: none ' readonly />&nbsp;<b> > 0.25000</b>
				<input type='text' style='width: 80px;background-color:#ffff80; border: none ' readonly />&nbsp;<b> >= 0.10000 e < 0.25000 </b>
				<input type='text' style='width: 80px;background-color:#b2dba1; border: none ' readonly />&nbsp;<b> < 0.10000</b>
			</td>
			<td width='20%' align='center'><input type='text' style='width: 80px;background-color:#669999; border: none ' readonly />&nbsp;<b> PKG</b></td>
			<td width='30%' align='center'><b>QTY</b>&nbsp;&nbsp;&nbsp;<input type='text' style='width: 20px;background-color:blue; border: none ' readonly />&nbsp;<b> = 1</b>
			<input type='text' style='width: 20px;background-color:green; border: none ' readonly />&nbsp;<b> > 1</b></td>
			</tr>
			<tr bgcolor='#8B8989'>

			<td width='20%' align='center' style='color: white; font-size: 20px'>MO: <b>$pesq</b></td>
			<td width='20%' align='center' style='color: white ;font-size: 20px'>
			 O total de itens dessa MO é: <b>$total</b></td>
			 <td width='10%' align='center' style='color: white;font-size: 20px'>VB &nbsp;<b>$mopeso_total(101) -  $mopeso2(57)</b> </td>
			<td width='30%' align='center' style='color: white;font-size: 20px'> 
			
			 Peso total: <b>".round($peso_total,3)."</b> | Max: <b>$peso_max</b> ($var_max%) | Min: <b>$peso_min</b> ($var_min%)</td>
			<td width='20%' align='center' style='color: white;font-size: 20px'>Familia: <b>$familia / $familia2</b></td>
			
				
		</tr> <tr bgcolor='#8B8989'>

			<td width='20%' align='center' style='color: white; font-size: 20px'>Peso Assembly: <b>$assy_total</b></td>
			
			<td width='20%' align='center' style='color: white;font-size: 20px'>Peso Packing: <b>$pkg_total</b></td>
			<td width='20%' align='center' style='color: white;font-size: 20px'>
			<input type='hidden' id='order' value='$pesq' />
			<button  type='button' class='btn btn-success' onclick='exp();exportar();'>Exportar</button></td>
			<td width='40%' colspan='2' align='center' style='color: white;font-size: 20px'>$busca
  
  <input type='text'   style='width:300px; color:black' value'teste' id='search_field'>&nbsp;
  <input class='btn btn-danger' type='button' value=' Pesquisar ' onclick='return pesquisa();' style='height: 40px' />
</div></tr>
			</table>";
			?>
	
	<script>

	function myFunction() {
     var r = confirm("Desja atualizar o peso?");
    if (r == true) {
        return true;
    } else {
        return exit;
    }
}
	
	</script>
<link href="../Library/bootstrap/css/bootstrap.css" rel="stylesheet"/>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="bootstrap/js/html5shiv.js"></script>
	<script src="bootstrap/js/respond.min.js"></script>

	<![endif]-->

  <style>
		th{
			text-align: center;
		}
		td{
		padding: 10px;
		}
		
	</style>
<div class="container-fluid">

<table border="0" cellspacing="1" cellpadding="0" align="center" class="table table-bordered">
	<tr bgcolor="#8B8989">
	<th height="30" align="center" ><b><font face="Arial"  color="#FFFFFF">IMAGES</font></b></th>
	<th  align="center" ><b><font face="Arial"  color="#FFFFFF">LAST UPDATE</font></b></th>
	<th align="center"  ><b><font face="Arial" color="#FFFFFF">USER<br>LAST UPDATE</font></b></th>
    <th align="center" ><b><font face="Arial"  color="#FFFFFF">MTM</font></b></th>
    <th align="center" ><b><font face="Arial"  color="#FFFFFF">MATERIAL_NAME</font></b></th>
    <th align="center" ><b><font face="Arial"  color="#FFFFFF">MATERIAL_CATEGORY_NAME</font></b></th>
    <th align="center"  ><b><font face="Arial"  color="#FFFFFF">MATERIAL_DESC</font></b></th>
    <th align="center"  ><b><font face="Arial" color="#FFFFFF">QTY</font></b></th>

    <th align="center"  ><b><font face="Arial" color="#FFFFFF">PESO</font></b></th>
	<th align="center"  ><b><font face="Arial"  color="#FFFFFF">STATUS</font></b></th>
    <th align="center"  ><b><font face="Arial"  color="#FFFFFF">ALTERAR</font></b></th>
	</tr>
    <form name="frm_alterar" method="post" action="<?php echo @$PHP_SELF ?>">
  	<?php $id = 0; 
	
	while($array_mt = @mysql_fetch_array($sql)) { 
	
	 $id = $id + 1;
	 $filename = "../PGI_Producto/Images_PN/".$array_mt[2].".jpg";
	 
#################### FUNÇÃO DEIXA O TR BICOLOR ####################
 	
	if(@$classe == "bgAlt") { @$classe = "bgAlt2"; } else { @$classe = "bgAlt"; }
	
#################### IF PARA MOSTRAR OS ITENS DE PACKING COM DESTAQUE AZUL ###################	

	if ($array_mt[3] == "PKGM" || $array_mt[3] == "PKG WD" || $array_mt[3] == "CD COLLECTIONS;" || $array_mt[3] == "MOUSE"  || $array_mt[3] == "ACCESSORY BOX"  || $array_mt[3] == "SHIPPING CARTON"   || $array_mt[3] == "NBK AC ADAPTER"  || $array_mt[3] == "NBK AC ADAPTER"   || $array_mt[3] == "SPEAKER EXTER FI"   || $array_mt[3] == "PACKAGING FIO"   || $array_mt[3] == "LINE CORD FIO"   || $array_mt[3] == "PKG COMP AND ACC"   || $array_mt[3] == "MISCELL PACKAGIN"   || $array_mt[3] == "MISCELL PACKAGIN"   || $array_mt[3] == "PACKAGED SOFT FI"   || $array_mt[3] == "SHIPPING BAG"   || $array_mt[3] == "POWER CORD"  || $array_mt[3] == "CD COLLECTION"  || $array_mt[3] == "PKG NOT SCAN"  || $array_mt[3] == "PKG P/N"  || $array_mt[3] == "PKG HC"  || $array_mt[3] == "MERGE NOT SCAN"  || $array_mt[3] == "MERGE P/N"  || $array_mt[3] == "MERGE HC" || $array_mt[3] == "LABEL PKG" || $array_mt[3] == "PREKIT HC" || $array_mt[3] == "PREKIT PN" || $array_mt[3] == "PREKIT PUB" ){?>

	<tr class="<?php echo $classe; ?>" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#C0B085'" onMouseOut="javascript:this.style.backgroundColor=''">

	<?php if (file_exists($filename)) { 

                    echo "<td align= 'center' style='padding: 10px;background-color: #669999; color: white'><img id='myImg' src='../PGI_Producto/Images_PN/".$array_mt[2].".jpg' width='80px' height='80px'  onclick='onClick(this)' /></td>";

                }elseif(file_exists($filename)){
                    echo "<td align= 'center' style='padding: 10px;background-color: #669999; color: white'><img id='myImg' src='../PGI_Producto/Images_PN/".$array_mt[2].".png' width='80px' height='80px'  onclick='onClick(this)' /></td>";
                }
				else {
                    echo "<td align= 'center' style='background-color: #669999; color: white;padding: 10px;width: 80px;height: 80px;'><img  src='img/fail.png' width='40px' heigh='40px'/></td>";
                } ?>
	
	
<?php
			if($array_mt[9] == '0000-00-00 00:00:00' || $array_mt[9] == '' ){ ?>
			<td align="center" style="background-color: #669999; color: white" ><font face="Arial" size="2">
          		<input type="text" style="background:none;border:none;text-align: center; width: 140px" value="0000-00-00 00:00:00" readonly/></font></td>
          	<?php }else{ ?>
			<td align="center" style="background-color: #669999; color: white" ><font face="Arial" size="2">
          		<input type="text"  style="background:none;border:none;text-align: center; width: 140px" value="<?php echo $array_mt[9]; ?>" readonly /></font></td>
          	<?php }?>

<?php if($array_mt[8] == ''){ ?>

          <td align="center" style="background-color: #669999; color: white" ><font face="Arial" size="2">
          <input type="text" style="background:none;border:none;text-align: center; font-weight: bold; width: 90px" value="NULL" readonly /></font></td>
<?php }else{ ?>

<td align="center" style="background-color: #669999; color: white"><font face="Arial" size="2">
          <input type="text"  style="background-color: #cc0000;color: white ;text-align: center; width: 100px" value="<?php echo $array_mt[8]; ?>"readonly /></font></td>
		 <?php } ?>
      <td align="center" style="background-color: #669999; color: white" ><font face="Arial" size="2">
          <input type="text" style="background:none;border:none;text-align: center;width: 120px" value="<?php echo $array_mt[1]; ?>" readonly /></font></td>

	  <td align="center" style="background-color: #669999; color: white" ><font face="Arial" size="2">
		  <input type="text" id="component_<?php echo $id; ?>" name="component" style="background:none;border:none;text-align: center; width: 120px;font-weight: bold;" value="<?php echo $array_mt[2]; ?>" readonly /></font></td>

	  <td align="center" style="background-color: #669999; color: white"><font face="Arial" size="2">
          <input type="text" style="background:none;border:none;text-align: center" value="<?php echo $array_mt[3]; ?>" readonly /></font></td>

      <td align="center" style="background-color: #669999; color: white"><font face="Arial" size="2">
          <input type="text" style="background:none;border:none;text-align: center; width: 250px" value="<?php echo $array_mt[4]; ?>" readonly/></font></td>

          <?php if($array_mt[7] <> 1){
          echo"<td align='center' style='background-color: #669999; color: white'>
          <input type='text'   style='background-color: green; color: white;border:none;text-align: center; width: 20px' value='$array_mt[7]' readonly /></td>";


			} else{
			 echo"<td align='center' style='background-color: #669999; color: white'><input type='text'   style='background-color: blue; color: white;border:none;text-align: center; width: 20px' value='$array_mt[7]' readonly /></td>";
			} ?>

<?php if($array_mt[5] >= 0.25000){  ?>

      <td align="center" style="background-color: #669999; " ><font face="Arial" size="2">
          <input type="text"  id="peso_<?php echo $id; ?>" name="peso" style="background-color: #ff8080;border:none;text-align: center; width: 80px" value="<?php echo $array_mt[5]; ?>" /></font></td>
<?php }elseif ($array_mt[5] >= 0.10000 && $array_mt[5] <= 0.24900 ){ ?>
 <td align="center" style="background-color: #669999; "><font face="Arial" size="2">
          <input type="text"  id="peso_<?php echo $id; ?>" name="peso" style="background-color: #ffff80;border:none;text-align: center; width: 80px" value="<?php echo $array_mt[5]; ?>" /></font></td>
         <?php } else{ ?>
         <td align="center" style="background-color: #669999; "><font face="Arial" size="2">
          <input type="text"  id="peso_<?php echo $id; ?>" name="peso" style="background-color: #b2dba1;border:none;text-align: center; width: 80px" value="<?php echo $array_mt[5]; ?>" /></font></td>


		  <?php }
		  if($array_mt[5] == 0 ){
            echo"<td align='center' style='padding:10px;background-color: #669999; color: white'><img src='img/red2.gif' /></td>";
        }else{
            echo"<td align='center' style='padding:10px;background-color: #669999; color: white'><img src='img/green.png' /></td>";
        }?>

	  <td align="center"  style="padding:5px;background-color: #669999; color: white"><font face="Arial" size="2">
	  <input type="hidden" id="mo_<?php echo $id; ?>" value="<?php echo $pesq; ?>" />
          <button type="submit" name="alterar" style="background:none;border:none;text-align: center; cursor:pointer; padding:10px" onClick="myFunction(); return validaForm('<?php echo $id; ?>','alterar_MO');" ><img src="img/refresh.png" alt="" /></button>
		  </font></td>
	</tr>


	<?php }else{ ?>






	<tr class="<?php echo $classe; ?>" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#C0B085'" onMouseOut="javascript:this.style.backgroundColor=''">
<?php if (file_exists($filename)) { //Função mostra na tela a imagem do funcionário, se a imagem estiver editada com o numero da matricula do funcionario, aparecerá a foto do funcionario

                    echo "<td align= 'center' style='padding: 10px'><img id='myImg' src='../PGI_Producto/Images_PN/".$array_mt[2].".jpg' width='80px' height='80px'  onclick='onClick(this)' /></td>";

                }elseif(file_exists($filename)){
                    echo "<td align= 'center' style='padding: 10px'><img id='myImg' src='../PGI_Producto/Images_PN/".$array_mt[2].".png' width='80px' height='80px'  onclick='onClick(this)' /></td>";
                }
				else {
                    echo "<td align= 'center' style='padding: 10px;width: 80px;height: 80px;'><img  src='img/fail.png' width='40px' heigh='40px'/></td>";
                } ?>
	
	
<?php
			if($array_mt[9] == '0000-00-00 00:00:00' || $array_mt[9] == '' ){ ?>
			<td align="center" ><font face="Arial" size="2">
          		<input type="text" style="background:none;border:none;text-align: center; width: 140px" value="0000-00-00 00:00:00" readonly/></font></td>
          	<?php }else{ ?>
			<td align="center" ><font face="Arial" size="2">
          		<input type="text"  style="background:none;border:none;text-align: center; width: 140px" value="<?php echo $array_mt[9]; ?>" readonly /></font></td>
          	<?php }?>

<?php if($array_mt[8] == ''){ ?>

          <td align="center" ><font face="Arial" size="2">
          <input type="text" style="background:none;border:none;text-align: center; font-weight: bold; width: 90px" value="NULL" readonly /></font></td>
<?php }else{ ?>

<td align="center" ><font face="Arial" size="2">
          <input type="text"  style="background-color: #cc0000;color: white ;text-align: center; width: 100px" value="<?php echo $array_mt[8]; ?>"readonly /></font></td>
		 <?php } ?>
      <td align="center" ><font face="Arial" size="2">
          <input type="text" style="background:none;border:none;text-align: center;width: 120px" value="<?php echo $array_mt[1]; ?>" readonly /></font></td>
      
	  <td align="center" ><font face="Arial" size="2">
		  <input type="text" id="component_<?php echo $id; ?>" name="component" style="background:none;border:none;text-align: center; width: 120px;font-weight: bold;" value="<?php echo $array_mt[2]; ?>" readonly /></font></td>
      
	  <td align="center" ><font face="Arial" size="2">
          <input type="text" style="background:none;border:none;text-align: center" value="<?php echo $array_mt[3]; ?>" readonly /></font></td>
		  
      <td align="center" ><font face="Arial" size="2">
          <input type="text" style="background:none;border:none;text-align: center; width: 250px" value="<?php echo $array_mt[4]; ?>" readonly/></font></td>

          <?php if($array_mt[7] <> 1){
          echo"<td align='center' >
          <input type='text'   style='background-color: green; color: white;border:none;text-align: center; width: 20px' value='$array_mt[7]' readonly /></td>";


			} else{
			 echo"<td align='center'><input type='text'   style='background-color: blue; color: white;border:none;text-align: center; width: 20px' value='$array_mt[7]' readonly /></td>";
			} ?>

<?php if($array_mt[5] >= 0.25000){  ?>

      <td align="center" ><font face="Arial" size="2">
          <input type="text"  id="peso_<?php echo $id; ?>" name="peso" style="background-color: #ff8080;border:none;text-align: center; width: 80px" value="<?php echo $array_mt[5]; ?>" /></font></td>
<?php }elseif ($array_mt[5] >= 0.10000 && $array_mt[5] <= 0.24900 ){ ?>
 <td align="center" ><font face="Arial" size="2">
          <input type="text"  id="peso_<?php echo $id; ?>" name="peso" style="background-color: #ffff80;border:none;text-align: center; width: 80px" value="<?php echo $array_mt[5]; ?>" /></font></td>
         <?php } else{ ?>
         <td align="center" ><font face="Arial" size="2">
          <input type="text"  id="peso_<?php echo $id; ?>" name="peso" style="background-color: #b2dba1;border:none;text-align: center; width: 80px" value="<?php echo $array_mt[5]; ?>" /></font></td>


		  <?php }
		  if($array_mt[5] == 0 ){
            echo"<td align='center' style='padding:10px'><img src='img/red2.gif' /></td>";
        }else{
            echo"<td align='center' style='padding:10px' ><img src='img/green.png' /></td>";
        }?>
      
	  <td align="center"  style="padding:5px;" ><font face="Arial" size="2">
	  <input type="hidden" id="mo_<?php echo $id; ?>" value="<?php echo $pesq; ?>" />
          <button type="submit" name="alterar" style="background:none;border:none;text-align: center; cursor:pointer; padding:10px" onClick="myFunction(); return validaForm('<?php echo $id; ?>','alterar_MO');" ><img src="img/refresh.png" alt="" /></button>
		  </font></td>
	</tr>
  <?php }} ?>
    </form>
</table>
	</div>
<!-- DIV PARA EXPANDIR AS FOTOS DAS PEÇAS -->	
	<div id="myModal" class="modal">
    <span class="close2" onclick="teste1();">×</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
	
</br>
<?php
 } else {
   echo "<br><br><div align=center><font face=Arial size=2 color=red><b>
        REGISTRO NÃO ENCONTRADO !!!!!<b><br><br></font></div>";
  } 

}	

function alterar_MO() {
@mysql_connect('localhost', 'root','')or die('<h1>Erro no Servidor!</h1>');	//Conecta com o MySQL
@mysql_select_db('controle') or die('<h1>Erro no Banco!</h1>');	
	//$app		 = "configBalança";
	//$action		 = "update";
	//$user 		 = $_COOKIE["Usuario"];
	$component 	 = $_REQUEST['component'];
	$peso 		 = $_REQUEST['peso'];
	$pesq		 = $_REQUEST['pesq'];
	$usuario =     $_SESSION['usuario'];
	$time = date('Y-m-d H:i:s');
	
	$sql = "select * from controle.entrada where codigo = '$component'";
  	$sql = @mysql_query($sql,$conn) or die("Erro no SQL: ".mysql_error());
	
	if (@mysql_num_rows($sql) > 0) {

 


		$sql = "INSERT into k2config.tabcomponentspeso (component,peso, matricula, date_time) values ('$component','$peso','$usuario', CURRENT_TIMESTAMP() ) on DUPLICATE KEY UPDATE peso = '$peso' , matricula =  '$usuario' , date_time = CURRENT_TIMESTAMP() ";
  	$sql = @mysql_query($sql,$conn) or die("Erro no SQL: ".@mysql_error());

	
 @mysql_query("call k2config.UpdateMOPeso",$conn);

$query_101 = @mysql_query("select b.order_num AS ORDER_NUM,sum(a.Peso*b.quantity) AS PESO
from k2config.tabcomponentspeso as a
inner join prom.order_bom as b
on b.material_name = a.component
left join prom.order_tab as c on b.order_num = c.order_num 
where (b.IS_BF not in ('N') or b.MATERIAL_CATEGORY_NAME in 
	('PKG WD','LABEL PU NV','FRU DE MB MOBILE','TE FRU HDD SVR','KITTING P/N','ASM NOT SCAN','ASM HC','ASM P/N',
				  'PKG P/N','LABEL PKG','MISC PACK PARTS','MISCELL PACKAGIN','PKG COMP AND ACC','CD COLLECTIONS;', 
				  'KEYBOARD','EXTERNAL CABLES','SHIPPING CARTON','PKGM','AC ADAPTER BLUE','MISCEL PACK MRG','ACCESSORY BOX','MOUSE','SHIP GROUP', 
				  'USER GUIDES','SHIPPING BAG','SHIP GROUP HS','MERGE P/N','SPEAKER KITS','CUSTOM CART LABK','NPL CLEA VOL LBL','POWER CORD','OPT KEYBOARD',
				  'ACCESORIES TE','VALIDA USB-CABLE','VALIDA DVD','VALIDA VESA M','CARTON LABEL','NBK AC ADAPTER','CUSTOM CART LAB','MERGE NOT SCAN', 
				  'DOC KITS; PACK S','MERGE HC','OPT MOUSE','PACKAGING COMPON','RAILS SERIALIZED','PKG NOT SCAN','PREKIT HC','PREKIT PN','PREKIT PUB', 
				  'SMART HIGH NS','SMART HIGH PN','SMART LOW NS','SMART LOW PN')) and
b.MATERIAL_CATEGORY_NAME not in ('COA3','DVD-RW FIO','SERIAL PORT FIO','VOLT TE','USB PORT FIO','VAO C&P SERVICE','VAO ASSET TAG FI','ENERGY STAR LAB','KIT RECOVERY CD','MISS SFW FIO','DVD FIO','SWITCH CAB FIO','MOUSE FIO','PROCESSOR FIO','SPEAKER INT FIO','AUDIO CARD FIO','CARD READER FIO','MISC PCI CARD FI','MISS NBK FIO','DOCUMENTATION FI','HARD DRIVE FIO','CDROM FIO','CHASSIS FIO','NPL CLEA VOL LBL','PACKAGING FIO','HA','SOFTWARE','LABELS FIO','L1 OSL MTY','L1 - PHANTOM','COA3','LINE CORD FIO','BASE FIO','MOTHERBOARD FIO','MISC INT PART FI','LCD NBK FIO','L1 COPT','BATTERY FIO','MEMORY FIO','WIRELESS CARD FI','SHIP GROUP FIO','KEYBOARD FIO')
and c.order_status in (5,7) 
group by b.order_num",$conn);

while($busca = mysql_fetch_array($query_101)){
	
	@mysql_query("INSERT INTO K2CONFIG.TABMOPESO (ORDER_NUM,PESO) values('$busca[0]','$busca[1]')ON DUPLICATE KEY UPDATE PESO = '$busca[1]'",$conn2);
	
}
sleep(5);


	pesquisar_MO($pesq);
	//sleep(60);
	//pesquisar_MO($pesq);

	
}

	
	

 else {
    $sql = "INSERT into k2config.tabcomponentspeso (component,peso, matricula) values ('$component','$peso','$usuario')";
  	$sql = @mysql_query($sql,$conn) or die("Erro no SQL: ".@mysql_error());
	@mysql_query("call k2config.UpdateMOPeso",$conn);
	
	$query_101 = @mysql_query("select b.order_num AS ORDER_NUM,sum(a.Peso*b.quantity) AS PESO
								from k2config.tabcomponentspeso as a
								inner join prom.order_bom as b
								on b.material_name = a.component
								left join prom.order_tab as c on b.order_num = c.order_num 
								where (b.IS_BF not in ('N') or b.MATERIAL_CATEGORY_NAME in 
									('PKG WD','LABEL PU NV','FRU DE MB MOBILE','TE FRU HDD SVR','KITTING P/N','ASM NOT SCAN','ASM HC','ASM P/N',
												  'PKG P/N','LABEL PKG','MISC PACK PARTS','MISCELL PACKAGIN','PKG COMP AND ACC','CD COLLECTIONS;', 
												  'KEYBOARD','EXTERNAL CABLES','SHIPPING CARTON','PKGM','AC ADAPTER BLUE','MISCEL PACK MRG','ACCESSORY BOX','MOUSE','SHIP GROUP', 
												  'USER GUIDES','SHIPPING BAG','SHIP GROUP HS','MERGE P/N','SPEAKER KITS','CUSTOM CART LABK','NPL CLEA VOL LBL','POWER CORD','OPT KEYBOARD',
												  'ACCESORIES TE','VALIDA USB-CABLE','VALIDA DVD','VALIDA VESA M','CARTON LABEL','NBK AC ADAPTER','CUSTOM CART LAB','MERGE NOT SCAN', 
												  'DOC KITS; PACK S','MERGE HC','OPT MOUSE','PACKAGING COMPON','RAILS SERIALIZED','PKG NOT SCAN','PREKIT HC','PREKIT PN','PREKIT PUB', 
												  'SMART HIGH NS','SMART HIGH PN','SMART LOW NS','SMART LOW PN')) and
								b.MATERIAL_CATEGORY_NAME not in ('COA3','DVD-RW FIO','SERIAL PORT FIO','VOLT TE','USB PORT FIO','VAO C&P SERVICE','VAO ASSET TAG FI','ENERGY STAR LAB','KIT RECOVERY CD','MISS SFW FIO','DVD FIO','SWITCH CAB FIO','MOUSE FIO','PROCESSOR FIO','SPEAKER INT FIO','AUDIO CARD FIO','CARD READER FIO','MISC PCI CARD FI','MISS NBK FIO','DOCUMENTATION FI','HARD DRIVE FIO','CDROM FIO','CHASSIS FIO','NPL CLEA VOL LBL','PACKAGING FIO','HA','SOFTWARE','LABELS FIO','L1 OSL MTY','L1 - PHANTOM','COA3','LINE CORD FIO','BASE FIO','MOTHERBOARD FIO','MISC INT PART FI','LCD NBK FIO','L1 COPT','BATTERY FIO','MEMORY FIO','WIRELESS CARD FI','SHIP GROUP FIO','KEYBOARD FIO')
								and c.order_status in (5,7) 
								group by b.order_num",$conn);

								while($busca = mysql_fetch_array($query_101)){
									
									@mysql_query("INSERT INTO K2CONFIG.TABMOPESO (ORDER_NUM,PESO) values('$busca[0]','$busca[1]')ON DUPLICATE KEY UPDATE PESO = '$busca[1]'",$conn2);
									
								}

	sleep(5);
	pesquisar_MO($pesq);
	
	
}

	

}


//function atu_MOPeso() {
  //	$sql_atu = @mysql_query("call k2config.UpdateMOPeso",$conn)
//}


?>
