<?php
session_start(); 
include('conexao.php');

if (isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['cpf']) &&	isset($_POST['dataNasc']) && 
isset($_POST['cidade']) && isset($_POST['telefone']) && isset($_POST['endereco']) && isset($_POST['numerocasa']) 
&& isset($_POST['email']) && isset($_POST['senha'])) {

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$cpf = $_POST['cpf'];
	$cidade = $_POST['cidade'];
	$telefone = $_POST['telefone'];
	$endereco = $_POST['endereco'];
	$numerocasa = $_POST['numerocasa'];
	$email = $_POST['email'];

	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

//CALCULO DA IDADE	
date_default_timezone_set('America/Sao_Paulo');
	$dataNasc = $_POST['dataNasc'];
	$dataatual =  date('Y-m-d');
	$idade = $dataatual-$dataNasc;
	
	$sql = "INSERT INTO usuarios 
			 VALUES (null,
				    '$nome',
					'$sobrenome',
					'$cpf',
					'$dataNasc',
					'$cidade',
					'$telefone',
					'$endereco',
					'$numerocasa',
					'$email',
					'$senha',
					'cliente');";
	// $cadastrar = mysqli_query($conectado, $sql);
	header("location: ../login.php");

} else {
	echo "<script> alert('Erro ao se cadastrar. Confira se inseriu todos os dados corretamente!');
	window.location.replace('../cadastro.php'); </script>";
}
?>
