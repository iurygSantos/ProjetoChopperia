<?php
include('../index1.php');
		//include('conexao.php');	
			$id_usuario = $_GET['id_usuario'];
			
			$SQL = "SELECT * from usuarios where id_usuario = " . $id_usuario;
			
			$dados = mysqli_query($conectado, $SQL);
			while ($linha = mysqli_fetch_assoc($dados)) {
				$id_usuario 	= $linha['id_usuario'];
				$nome 			= $linha['nome'];
				$sobrenome 		= $linha['sobrenome'];
				$cidade 		= $linha['cidade'];
				$telefone 		= $linha['telefone'];
				$endereco 		= $linha['endereco'];
				$numero_casa 	= $linha['numero_casa'];
				$email 			= $linha['email'];
			}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar cliente</title>

</head>
<body>
<header class="p-3">
		<legend>Mudar</legend>
	<form name="Editarclienteform" method="GET" action="atualiza_dadoscliente.php">

		<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
		Nome: <input type="text" name="nome" autofocus value="<?php echo $nome; ?>"> <br>
		Sobrenome: <input type="text" name="sobrenome" value="<?php echo $sobrenome; ?>"> <br>
		Cidade: <input type="text" name="cidade" value="<?php echo $cidade; ?>"> <br>
		Telefone: <input type="tel" name="telefone" value="<?php echo $telefone; ?>"> <br>
		Endereço: <input type="text" name="endereco" value="<?php echo $endereco; ?>"> <br>
		Número da casa:<input type="number" name="numero_casa" value="<?php echo $numero_casa; ?>"> <br>
		Email: <input type="email" name="email" value="<?php echo $email; ?>"> <br>
		<input type="submit" name="btnGravar" value="Atualizar">
	
	</form>
</header>	
</body>
</html>
