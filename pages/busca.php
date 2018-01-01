<?php
	session_start(); 	//A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {		//Verifica se há seções
			//session_destroy();						//Destroi a seção por segurança
			header("Location: ../login.php"); exit;	//Redireciona o visitante para login
	}

	@mysql_connect('localhost', 'root','')or die('<h1>Erro no Servidor!</h1>');	//Conecta com o MySQL
	@mysql_select_db('controle') or die('<h1>Erro no Banco!</h1>');	 //Seleciona banco de dados
	
	$busca = @$_REQUEST['q'];
	//echo $busca;
	
	$sql = @mysql_query("select codigo, qtd, unidade, descricao, custo, venda, date_format(data, '%d-%m-%Y %H:%i-%s') as date from controle.entrada where (codigo like '$busca%' or descricao like '$busca%' or qtd like '$busca%' or unidade like '$busca%' or custo like '$busca%' or  date_format(data, '%d-%m-%Y %H:%i-%s') like '$busca%')");
?>
<style>
	table th{
		text-align: center;
		background-color: blue;
		color: white;
	}
	
	table td{
		text-align: center;
	}
</style>

<table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Quantidade</th>
                                        <th>Unidade</th>
                                        <th>descrição</th>
                                        <th>Custo</th>
										<th>Venda</th>
										<th>data</th>
                                    </tr>
                                </thead>
								<?php
									while($result = @mysql_fetch_array($sql)){
										echo "<tbody>";
											echo "<tr class='odd gradeX'>";
												echo "<td>".$result[0]."</td>";
												echo "<td>".$result[1]."</td>";
												echo "<td>".$result[2]."</td>";
												echo "<td>".$result[3]."</td>";
												echo "<td>".$result[4]."</td>";
												echo "<td>".$result[5]."</td>";
												echo "<td>".$result[6]."</td>";
											echo "</tr>";
										echo "</tbody>";
									}
								?>         
                            </table>