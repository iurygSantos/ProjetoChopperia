<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Quantidade inserida</title>

<?php  
include('../admin/index1.php');
?>

</head>
<body>
<font face="iluminary" size="4">

<fieldset>
<header style="float: center;" class="p-3">
<div class="alert alert-success" role="alert" align="center"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span ari-hidden="true">&times;</span>
    </button>
  <h3 style="color: green;"><b> Quantidade inserida com sucesso! </b></h3>	
</div>  
</header>


	<div class="col-mb-6 m-3" align="left">	
<?php
	include_once('conexao.php');
	$idproduto = $_POST['idproduto'];
	$QuantidadeAdd = $_POST['Nquantidade'];
	
	$sqlEstoque = "SELECT estoque FROM produtos WHERE idproduto = $idproduto";
	$selectEstoque = mysqli_query($conectado, $sqlEstoque);
	$Registro = mysqli_fetch_assoc($selectEstoque);

	$estoque = $Registro['estoque'];

	echo "O antigo estoque: " .$estoque . "<br>";
	echo "A quantidade que será adicionada: " . $QuantidadeAdd . "<br>";
	$novoEstoque = $estoque + $QuantidadeAdd;
	echo "Estoque atual: " .$novoEstoque . "<br>";
	$sqlUpdate = "UPDATE produtos SET estoque =".$novoEstoque." WHERE idproduto =".$idproduto;
	$atualizar = mysqli_query($conectado, $sqlUpdate);
?>

<br>
	</div>
</fieldset>

<a href="../admin/loja.php" class="btn btn" style="margin-top: 3%;"> Voltar a loja </a>

</font>
</body>
</html>

