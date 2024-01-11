<!DOCTYPE html>
<html>
<head>
<?php
include ('../admin/index1.php');

		//include("conexao.php");	
			$idproduto = $_GET['idproduto'];
			
			$SQL = "SELECT * FROM produtos where idproduto = " . $idproduto;
			
			$dados = mysqli_query($conectado, $SQL);
			while ($linha = mysqli_fetch_assoc($dados)) {
				$idproduto = $linha['idproduto'];
				$nome_produto = $linha['nome_produto'];
				$preco_litro = $linha['preco_litro'];
				$preco_barril = $linha['preco_barril'];
				$imagemProduto = $linha['imagemProduto'];
				$estoque = $linha['estoque'];
			}
?>

	<meta charset="utf-8">
	<title>Editar Produto</title>

</head>
<body>
<header class="p-3">
		<legend>Mudar</legend>
	<form name="editarproduto" method="GET" action="atualizarproduto.php">

		<input type="hidden" name="idproduto" value="<?php echo $idproduto ?>">
		Nome do produto: <input type="text" name="nome_produto" autofocus value="<?php echo 
		$nome_produto ?>"> <br>
		Preço do litro: <input type="text" name="preco_litro" value="<?php echo $preco_litro ?>"> <br>
		Preço do barril: <input type="text" name="preco_barril" value="<?php echo $preco_barril ?>"> <br>
		<!-- 	 -->
		Estoque: <input type="text" name="estoque" value="<?php echo $estoque ?>"> <br>
		
		<input type="submit" name="btnGravar" value="Atualizar">
	
	</form>
</header>	
</body>
</html>