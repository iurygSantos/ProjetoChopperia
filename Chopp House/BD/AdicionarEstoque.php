<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Adicionar quantidade produto</title>

	<?php  
	include('../admin/index1.php');
	?>

</head>
<body>
<font face="luminari" size="4"><br>

<header class="p-3">
<legend align="center"><h1><b> Adicionar quantidade </b></h1></legend>	
	<br>
	<div class="col-mb-6 m-3" align="left">	
		<?php

		$idproduto = $_GET['idproduto'];
		echo "ID do produto: ". $idproduto ."<br>";
		?>
	<form action="OPestoque.php" method="POST">
			<input type="hidden" name="idproduto" value="<?php echo $idproduto ?>">
			Quantidade: <input type="number" class="form-control-sm" name="Nquantidade">
			<input type="submit" class="btn btn border-dark" name="Gravar" value="Gravar">
	</form>
<br>
	</div>
</header>
	<a href="../admin/loja.php" style="padding-top: 3%;" class="btn btn"> Voltar para a loja </a>
</header>
</font>	
</body>
</html>
