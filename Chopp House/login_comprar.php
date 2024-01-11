<?php  
session_start();
include('BD/conexao.php');

$login = $_SESSION['login'];

if (!isset($login)) {
	echo "<script> alert('Você deve logar antes de comprar algum produto');
	window.location.replace('login.php'); </script>";
} else {
	header('location: finalizarcompra.php');
}
?>