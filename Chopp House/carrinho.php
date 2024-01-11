<?php include('index1.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Carrinho De Compras </title>

	<link rel="stylesheet" href="css/carrinho.css">

	<?php
		//adionar carrinho
	if(!isset($_SESSION['carrinho'])){
		$_SESSION['carrinho'] = array();

	} 

	//adiciona produto
	if(isset($_GET['acao'])){
		if($_GET['acao'] == 'add'){
			$idProduto = intval($_GET['idproduto']);

			if(!isset($_SESSION['carrinho'][$idProduto])){
				$_SESSION['carrinho'][$idProduto] = 1;
			} else {
				$_SESSION['carrinho'][$idProduto] += 1;
			}
		}				
	} 
		//remover carrinho
	if (isset($_GET['acao'])) {	
		if($_GET['acao'] == 'del'){
			$idProduto = intval($_GET['idproduto']);
			if(isset($_SESSION['carrinho'][$idProduto])){
				unset($_SESSION['carrinho'][$idProduto]);
			}
		} //Alterar Quantidade
	    if($_GET['acao'] == 'up') {
			if(is_array($_POST['prod'])) {
				foreach($_POST['prod'] as $idProduto => $qtd){
					$idProduto = intval($idProduto);
					$qtd = intval($qtd);
					if(!empty($qtd) || $qtd <>0){
						$_SESSION['carrinho'][$idProduto] = $qtd;
					} else {
						unset($_SESSION['carrinho'][$idProduto]);
					}
				}
			}
		}	
	}	
	?>	

</head>
<body background="img/bg.png">
<header class="container-carrinho">

	<table border="1" class="table"> 
	<thead class="thead-table-carrinho">
		<tr>
			<th width="20"> Produto </th>
			<th width="20"> Quantidade </th>
			<th width="89"> Preço </th>
			<th width="100"> SubTotal </th>
			<th width="64"> Remover </th>
		</tr>
	</thead>
	<form action="?acao=up" method="POST">
	<tfoot>
		<tr>
			<td colspan="5"><input type="submit" style="border-color: black;" value="Atualizar Carrinho" name="prod" class="btn" title="Atualizar carrinho"></td>
		</tr>
		
		<form action="finalizarcompra.php" method="POST">
		<tr>
			<td colspan="4">
				<a href="loja.php" class="btn btn-outline-primary" title="Continuar Comprando"> Continuar Comprando </a></td>
			<td>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="teleEntrega" value="entregar" id="save-info">
					
					<label class="custom-control-label" for="save-info"	> Entregar em casa </label>
				</div>
				<?php
				$entrega = $_POST['teleEntrega']; 

				if (isset($entrega)) {
					$frete = 20;
				} else {
					$frete = 0;
				}
				?>
			</td>	
		</tr>
	<tr>
		<td colspan="5">
		<?php  
			if (count($_SESSION['carrinho']) === 0) {} 
			else {
		?>	
			<a href="login_comprar.php" class="btn btn-outline-success" style="float: right;"> Finalizar compra </a>
		<?php 
			} 
		?>		
		</td>
	</tr>		
	</tfoot>
	<tbody>
		
		<?php
			if(count($_SESSION['carrinho']) == 0) {
				echo '<tr> 
						<td colspan="5"><h5><font color="red"> Não há Produto no carrinho! </font></h5></td>
					</tr>';
			}
			else {
				require("BD/conexao.php");
				$total = 0;
				$_SESSION['dados'] =  array();
				foreach($_SESSION['carrinho'] as $idProduto => $qtd) {
					$sql = "SELECT * FROM produtos WHERE idproduto = $idProduto";

					$conjuntoregistros = mysqli_query($conectado, $sql)
						or die(mysqli_error($conexao));

						$registro = mysqli_fetch_assoc($conjuntoregistros);

						$nomeProduto  = $registro['nome_produto'];

						$precoProduto = number_format($registro['preco_barril'], 2,',','.');

						$sub = number_format($registro['preco_barril'] * $qtd, 2,',','.');

						$totalcompra += $registro['preco_barril'] * $qtd;
						$totalf = $totalcompra + $frete;

						echo '
							<tr>
							<td>'.$nomeProduto.'</td>
							<td><input type="text" size="3" name="prod['.$idProduto.']" value="'.$qtd.'" / ></td>
							<td> R$ '.$precoProduto.'</td>
							<td> R$ '.$sub.'</td>
							<td><a href="?acao=del&idproduto='.$idProduto.'" title="Remover produto do carrinho" style="float: center;">  
							<i class="fas fa-trash-alt"></i> </a></td>
							</tr>'; 
			
			array_push(
			$_SESSION['dados'],
			array(
				'idproduto' => $idProduto,
				//'idvenda' => 1,
				'quantidade' => $qtd,
				'total' => $sub
				)
				);//arrayPuch	
				}

				$total = number_format($totalf, 2,',','.');
				echo '
				<tr>
				<td colspan="4">Total</td>
				<td>R$ '.$total.'</td>
				</tr>';
				$_SESSION['total'] = $total;
			}
			
			
		?> 
	</form>
	</tbody>
	</table>

</header>
</body>
</html>