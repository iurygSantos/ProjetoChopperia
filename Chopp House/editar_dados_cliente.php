<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Editar dados pessoais </title>

	<link rel="icon" type="image/jpg" href="../img/choppcup.png">	

<?php
include('index1.php'); 
	
	$id_usuario = $_GET['id_usuario'];
	
	$SQL = "SELECT * FROM usuarios where id_usuario = " . $id_usuario;
	$dados = mysqli_query($conectado, $SQL);

	while ($linha = mysqli_fetch_assoc($dados)) {
		$id_usuario 	 = $linha['id_usuario'];
		$nome 			 = $linha['nome'];
		$sobrenome 		 = $linha['sobrenome'];
		$cpf			 = $linha['cpf'];
		$data_nascimento = $linha['data_nascimento'];
		$cidade 		 = $linha['cidade'];
		$telefone		 = $linha['telefone'];
		$endereco 		 = $linha['endereco'];
		$numero_casa 	 = $linha['numero_casa'];
		$email 			 = $linha['email'];
	}
?>
<style>
.container-dados-cliente {
	display: flex;
	flex-wrap: wrap;
	max-width: 50%;
	margin: 0 auto;
	padding: 15px;
	border: solid 1px;
}	

#btnGravar {
	width: 140px;
	height: 40px;
	margin: 10px;
	padding: 5px;
	border: none;
	border-radius: 3px;
	text-decoration: none;
	background-color: #34fa;
	cursor: pointer; 
	outline: none;
}
#btnGravar:hover {
	border: solid 1px;
	background-color: #d9d9d9;
} 
</style>	
</head>
<body>

<header class="p-3">
	<legend>Meus dados</legend>

	<div class="container-dados-cliente">
	<form method="POST" action="BD/atualiza_dadoscliente.php">
		<input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
		<p>Nome:</p> <input type="text" name="nome" autofocus value="<?php echo 
		$nome ?>">

		<p>Sobrenome:</p> <input type="text" name="sobrenome" autofocus value="<?php echo 
		$sobrenome ?>">

		<p>CPF:</p> <input type="text" name="cpf" autofocus value="<?php echo 
		$cpf ?>">

		<p>Data de nascimento:</p> <input type="date" name="data_nascimento" 
		value="<?php echo $data_nascimento ?>">

		<p>Cidade:</p> <input type="text" name="cidade" autofocus value="<?php echo 
		$cidade ?>">

		<p>Telefone:</p> <input type="text" name="telefone" autofocus value="<?php echo 
		$telefone ?>">

		<p>Endereço:</p> <input type="text" name="endereco" autofocus value="<?php echo 
		$endereco ?>">

		<p>Numero da casa:</p> <input type="text" name="numero_casa" autofocus value="<?php echo $numero_casa ?>">

		<p>Email:</p> <input type="text" name="email" autofocus value="<?php echo 
		$email ?>">
		
		<button id="btnGravar">Aualizar dados</button>
	</form>
	</div>
</header>	
</body>
</html>