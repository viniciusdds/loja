<?php
	session_start(); 	//A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {		//Verifica se há seções
			//session_destroy();						//Destroi a seção por segurança
			header("Location: ../login.php"); exit;	//Redireciona o visitante para login
	}
	
	@mysql_connect('localhost', 'root','')or die('<h1>Erro no Servidor!</h1>');	//Conecta com o MySQL
	@mysql_select_db('controle') or die('<h1>Erro no Banco!</h1>');	
	
	$sql = @mysql_query("SELECT b.codigo, a.qtd, b.qtd, b.unidade, b.descricao, b.custo, b.venda, b.data FROM controle.estoque a 
							inner join controle.entrada b
							on a.codigo = b.codigo");
?>
<html>
<head>
<style>
	table th{
		text-align: center;
		background-color: blue;
		color: white;
	}
	table td{
		text-align: center;
	}
	
	input[type=text]{
		text-align: center;
		width: 100%;
	}
	
	table td #codigo{
		background-color: yellow;
	}
</style>

</head>
<body>
    
    <table width="100%" class="table table-striped table-bordered table-hover" >
        <thead>
            <tr>
                <th>Código</th>
                <th>Qtd Anterior</th>
				<th>Qtd Atual</th>
                <th>Unidade</th>
                <th>Descrição</th>
                <th>Custo</th>
				<th>Venda</th>
				<th>Data</th>
            </tr>
        </thead>
		<?php 
			$id = 0; while($result = @mysql_fetch_array($sql)){
				$id = $id + 1;
		?>
		<tbody>
			<tr class='odd gradeX' id='result'>
				<td width='10%'><input type='text' disabled='disabled' id='codigo_<?php echo $id; ?>' name='codigo' value='<?php echo $result[0]; ?>'/></td>
				<td width='10%'><input type='text' disabled='disabled' id='qtd1_<?php echo $id; ?>' name='qtd1' value='<?php echo $result[1]; ?>'/></td>
				<td width='10%'><input type='text' disabled='disabled' id='qtd2_<?php echo $id; ?>' name='qtd2' value='<?php echo $result[2]; ?>'/></td>
				<td width='10%'><input type='text' disabled='disabled' id='unidade_<?php echo $id; ?>' name='unidade' value='<?php echo $result[3]; ?>'/></td>
				<td width='10%'><input type='text' disabled='disabled' id='desc_<?php echo $id; ?>' name='desc' value='<?php echo $result[4]; ?>'/></td>
				<td width='10%'><input type='text' disabled='disabled' id='custo_<?php echo $id; ?>' name='custo' value='<?php echo $result[5]; ?>'/></td>
				<td width='10%'><input type='text' disabled='disabled' id='venda_<?php echo $id; ?>' name='venda' value='<?php echo $result[6]; ?>'/></td>
				<td width='20%'><input type='text' disabled='disabled' value='<?php echo $result[7]; ?>'/></td>
			</tr>
		</tbody>
		<?php
			}
		?>
    </table>
    <!-- /.table-responsive -->										
                        
</body>
</html>
