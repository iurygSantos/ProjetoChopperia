<?php 
if (isset($_SESSION['login_erro'])) {
	session_destroy();
	exit;
}

session_start();
include('BD/conexao.php');

$login = $_POST['login']; 
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$login'";
$result = mysqli_query($conectado, $sql);
$registro = mysqli_fetch_assoc($result);

$tipo = $registro['tipo'];

$contagem = mysqli_affected_rows($conectado);

if ($contagem > 0) 
{
	if ($pwd = password_verify($senha, $registro['senha'])) 
	{
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
			if (strtolower($tipo) == 'c') 
			{
				echo "<script> alert('Bem vindo a Chopp House Beer ". $registro['nome'] . "');
				window.location.replace('index.php'); </script>";
			}
			else 
			{
				echo "<script> alert('Bem vindo a Chopp House Beer ". $registro['nome'] . "');
				window.location.replace('admin/index.php'); </script>";
			}
	} 
	else 
	{
		echo "<script> alert('Erro ao descriptografar a senha, entre em contato com o suporte do sistema por favor, obrigado!');
		window.location.replace('login.php'); </script>!";
	}
} 
else 
{	
	$_SESSION['login_erro'] = $login; 
	$_SESSION['senha_erro'] = $senha;

	echo "<script> window.location.replace('login.php'); </script>";
}
?> 