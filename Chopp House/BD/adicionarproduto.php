<?php  
include('conexao.php');

$nomeproduto = $_GET['nomeproduto'];
$imagemproduto = $_GET['image'];
$precolitro = $_GET['precolitro'];
$precobarril = $_GET['precobarril'];

$sql = "INSERT INTO produtos VALUES(null, '$nomeproduto', '$precolitro', '$precobarril', '$imagemproduto', '') ";
$insere = mysqli_query($conectado, $sql); 

if ($insere) {
	header('location: ../admin/loja.php'); 
} else {
	echo "Produto não inserido!";
}
?>