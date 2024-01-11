<?php  
	include('index1.php');

	$email = $_SESSION['login']; 

	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$dados = mysqli_query($conectado, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Meus dados </title>
	
<style>
.card {
	margin: 0 auto; 
	padding: 5px;
	min-width: 25%; 
    max-width: 80%;
}

.fa-user-edit {
	text-decoration: none;
	font-size: 24px;
}	
</style>

</head>
<body background="img/back.png"> 

<div class="card">
	<table bgcolor="white" align="center" class="table table-striped">
		<thead class="table-dark">
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Cidade</th>
			<th>Telefone</th>
			<th>Endereço</th>
			<th>Número da casa</th>
			<th>Email</th>
			<th>Opção</th>
		</thead>
	<?php  
	$l=0;
		while ($registro = mysqli_fetch_assoc($dados)) {		
	if ($l%2==0) {
		echo "<tr bgcolor='white'>";
	}
	else {
		echo "<tr bgcolor='white'>";
	}
		echo "<td>".$registro['nome']."</td>";
		echo "<td>".$registro['sobrenome']."</td>";
		echo "<td>".$registro['cidade']."</td>";
		echo "<td>".$registro['telefone']."</td>";
		echo "<td>".$registro['endereco']."</td>";
		echo "<td align='center'>".$registro['numero_casa']."</td>";
		echo "<td>".$registro['email']."</td>";
	$l++;
	?>
		<td>
			<a href="editar_dados_cliente.php?id_usuario=<?php echo $registro['id_usuario']; ?>">
				<i class="fas fa-user-edit"></i>
			</a>
		</td>
	</tr>
	<?php  
	}
	?>
	</table>
</div>	


</body>
</html>	