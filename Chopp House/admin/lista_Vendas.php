<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de clientes</title>

	<link rel="stylesheet" href="../css/style_listaVenda.css">

	<?php
	include('index1.php');
	$SQL_vendas = "SELECT * from vendas";
 
 	$dados_venda = mysqli_query($conectado, $SQL_vendas);

	?>
</head>
<body background="../img/back.png">

<div class="container-lista-venda">
	<legend> Lista das Vendas </legend>
	<table class="table table-striped table-light table-bordered">
		<thead class="thead-dark">
			<th>#</th>
			<th>Nome do Cliente</th>
			<th>Sobrenome</th>
			<th>Data da Venda</th>
			<th>Cidade</th>
			<th>Endereço</th>
			<th>Telefone de contato</th>
			<th>Valor total</th>
		</thead>	
	<?php

	while ($registro = mysqli_fetch_assoc($dados_venda))
	{
		$sqlCliente = "SELECT * FROM usuarios WHERE id_usuario=".$registro['id_usuario'];
		$ConsultarNome = mysqli_query($conectado, $sqlCliente);
		$RegistroNome = mysqli_fetch_assoc($ConsultarNome);
		
		echo "<tr>".
					"<td> - </td>".
					"<td>" . $RegistroNome['nome'] . "</td>".
					"<td>" . $RegistroNome['sobrenome'] . "</td>".
					"<td>" . $registro['data_venda'] . "</td>".
					"<td>" . $RegistroNome['cidade'] . "</td>".
					"<td>" . $RegistroNome['endereco'] . "</td>".
					"<td>" . $RegistroNome['telefone'] . "</td>".
					"<td>" . $registro['total'] . "</td>".
			"</tr>";
	
	}
	?>
	</table>
</divs>			
</body>
</html>