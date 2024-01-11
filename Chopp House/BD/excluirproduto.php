<?php  
include_once('conexao.php');
	
$id_produto = $_GET['idproduto'];	

$sql = "DELETE FROM produtos WHERE idproduto = $id_produto"; 
$deleta= mysqli_query($conectado, $sql) or die("Esse produto não pode ser excluido!"); 
//nao exlui pois ele já esta com relacionamento na tabela itens_vendas

if ($del_produto == '') {
header('../admin/loja.php');
} else{
echo "<script>alert('Não foi possível excluir o produto!');
location.href=\"../admin/loja.php\"</script>";
}
?>