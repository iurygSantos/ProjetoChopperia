<?php
session_start(); 
include('../BD/conexao.php');

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

	//$senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$senha = $_POST['senha'];

//CALCULO DA IDADE	
date_default_timezone_set('America/Sao_Paulo');
	$dataNasc = $_POST['dataNasc'];
	$dataatual =  date('Y-m-d');
	$idade = $dataatual-$dataNasc;
	
	if ($idade < 18) {
	$_SESSION['msgidade'] = "<br> <h4><b><font color='red' face='times'> Você só pode acesar essa página se for maior de 18 anos! <i class='em em-underage'></i> </font></b></h4>";
	header('location: cadastro.php');
	}// else ("SELECT * FROM usuarios WHERE email_cliente = '{$email}' LIMIT 1") {
	/* Checar se o Email já existeno banco de dados */			
	//echo "<h2>	Esse email já está sendo usado por outro usuário!	</h2>"; 
	//} 
	else {	
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
						'$senha');";
	$cadastrar = mysqli_query($conectado, $sql);
	header("location: login.php");
	}
} else {
	echo "<h2><font color='red'> Erro ao se cadastrar! </font></h2>";
}
?>
