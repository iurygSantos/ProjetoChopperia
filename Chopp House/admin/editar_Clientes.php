<!DOCTYPE html>
<html>
<head>
	
<?php
include("index1.php");

	$id_usuario = $_GET['id_usuario'];
	
	$SQL = "SELECT * from usuarios where id_usuario = " . $id_usuario;
	
	$dados = mysqli_query($conectado, $SQL);
	while ($linha 	= mysqli_fetch_assoc($dados)) {
		$id_usuario = $linha['id_usuario'];
		$nome 		= $linha['nome'];
		$sobrenome 	= $linha['sobrenome'];
		$cidade 	= $linha['cidade'];
		$endereco 	= $linha['endereco'];
		$email 		= $linha['email'];
	}
?>
<title>Editar cliente</title>
</head>
<body>
	<form name="Editarclienteform" method="GET" action="../BD/atualiza_dadoscliente.php">
		<fieldset>
			<legend>Editar cliente</legend>
			<input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
			Nome: <input type="text" name="nome" autofocus value="<?php echo $nome?>"><br>
			Sobrenome: <input type="text" name="sobrenome" value="<?php echo $sobrenome?>"><br>
			Cidade: <input type="text" name="cidade" value="<?php echo $cidade?>"><br>
			Endereço:<input type="text" name="endereco" value="<?php echo $endereco?>"><br>
			Email: <input type="text" name="email" value="<?php echo $email?>"><br>
			<input type="submit" name="btnGravar" value="Atualizar">
		</fieldset>
	</form>
</body>
</html>