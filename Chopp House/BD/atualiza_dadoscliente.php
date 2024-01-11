<?php
	include('conexao.php');

	$id_usuario 		= $_POST['id_usuario'];
	$nome 				= $_POST['nome'];
	$sobrenome 			= $_POST['sobrenome'];
	$cpf				= $_POST['cpf'];
	$data_nascimento 	= $_POST['data_nascimento'];
	$cidade 			= $_POST['cidade'];
	$telefone 			= $_POST['telefone'];
	$endereco 			= $_POST['endereco'];
	$numero_casa 		= $_POST['numero_casa'];
	$email 				= $_POST['email'];

	$SQL = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', cpf = '$cpf', data_nascimento = '$data_nascimento', cidade = '$cidade', telefone = '$telefone', endereco = '$endereco', numero_casa = '$numero_casa', email = '$email' WHERE id_usuario = '$id_usuario'";

	// echo $SQL;
	mysqli_query($conectado, $SQL);
	header('location: ../dadoscliente.php');

?>