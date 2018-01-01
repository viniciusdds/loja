<?php 
	
	echo "<meta charset='UTF-8'>";
	
	define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DBSA','controle');

    $conexao = @mysql_connect(HOST,USER,PASS);
    $banco = @mysql_select_db(DBSA);
	
	$inicio = @$_REQUEST['inicio'];
	$fim = @$_REQUEST['fim'];
	
	$arquivo = "export.xls";
	
	
	$sql = "select * from controle.entrada where data >= '$inicio 00:00:00' and data <= '$fim 23:59:59' order by data desc";
	
	$result = @mysql_query($sql);

	$rows = @mysql_num_rows($result);
		if($rows > 0){
		$tabela = '<table border="1">';
		$tabela .= '<tr>';
		$tabela .= '<td colspan="7" align="center" style="background-color: green; color: white"><b style="font-size: 20px">Lista de Estoque</b></tr>';
		$tabela .= '</tr>';
		$tabela .= '<tr>';
		$tabela .= '<td align="center"><b>Código</b></td>';
		$tabela .= '<td align="center"><b>Quantidade</b></td>';
		$tabela .= '<td align="center"><b>Unidade</b></td>';
		$tabela .= '<td align="center"><b>Descrição</b></td>';
		$tabela .= '<td align="center"><b>Custo</b></td>';
		$tabela .= '<td align="center"><b>Venda</b></td>';
		$tabela .= '<td align="center"><b>Data</b></td>';
		$tabela .= '</tr>';
	
	while($dados = @mysql_fetch_array($result)){
		$tabela .='<tr>';
		$tabela .='<td align="center">'.$dados['codigo'].'</td>';
		$tabela .='<td align="center">'.$dados['qtd'].'</td>';
		$tabela .='<td align="center">'.$dados['unidade'].'</td>';
		$tabela .='<td align="center">'.$dados['descricao'].'</td>';
		$tabela .='<td align="center">'.$dados['custo'].'</td>';
		$tabela .='<td align="center">'.$dados['venda'].'</td>';
		$tabela .='<td align="center">'.$dados['data'].'</td>';
		$tabela .='</tr>';
	}
	
	$tabela .='</table>';

}else{
	$tabela = '<table border="1">';
		$tabela .= '<tr>';
		$tabela .= '<td colspan="7" align="center" style="background-color: green; color: white"><b style="font-size: 20px">Lista de Estoque</b></tr>';
		$tabela .= '</tr>';
		$tabela .= '<tr>';
		$tabela .= '<td align="center"><b>Código</b></td>';
		$tabela .= '<td align="center"><b>Quantidade</b></td>';
		$tabela .= '<td align="center"><b>Unidade</b></td>';
		$tabela .= '<td align="center"><b>Descrição</b></td>';
		$tabela .= '<td align="center"><b>Custo</b></td>';
		$tabela .= '<td align="center"><b>Venda</b></td>';
		$tabela .= '<td align="center"><b>Data</b></td>';
		$tabela .= '</tr>';
	
	
		$tabela .='<tr>';
		$tabela .='<td colspan="7" align="center">Não Há Registros Nas Datas setadas!</td>';
		$tabela .='</tr>';
	
}	
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );

	
	
	echo $tabela;

?>