<?php
	include_once('conexao.php');

	$idproduto = $_GET['idproduto'];
	$nome_produto = $_GET['nome_produto'];
	$preco_litro = $_GET['preco_litro'];
	$preco_barril = $_GET['preco_barril'];
	$imagemProduto = $_GET['imagemProduto'];
	$estoque = $_GET['estoque'];				

	$SQL = "UPDATE produtos SET nome_produto = '$nome_produto', preco_litro = '$preco_litro', preco_barril = '$preco_barril', estoque = '$estoque' WHERE idproduto = ".$idproduto;

	mysqli_query($conectado, $SQL);
	header('location: ../admin/loja.php');

?>