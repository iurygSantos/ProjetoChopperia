<?php
include_once('conexao.php');
$id_usuario = $_GET['id_usuario'];

	$SQL = "DELETE FROM usuarios WHERE id_usuario = ". $id_usuario;

	mysqli_query($conectado, $SQL) or  die("Não Excluido");
	mysqli_close($conectado);
	
	header("location: ../admin/listarclientes.php");

?>