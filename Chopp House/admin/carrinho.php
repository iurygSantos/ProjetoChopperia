<?php
include('index1.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Carrinho De Compras </title>

	<?php
	
	if(!isset($_SESSION['carrinho'])){
		$_SESSION['carrinho'] = array();
	} //adiciona produtio

	if(isset($_GET['acao'])){
		//adionar carrinho
		if($_GET['acao'] == 'add'){
			$idProduto = intval($_GET['idproduto']);

			if(!isset($_SESSION['carrinho'][$idProduto])){
				$_SESSION['carrinho'][$idProduto] = 1;
			} else {
				$_SESSION['carrinho'][$idProduto] += 1;
					}
			//remover carrinho
		}				
	} 
	if (isset($_GET['acao'])) {	
		if($_GET['acao'] == 'del'){
			$idProduto = intval($_GET['idproduto']);
			if(isset($_SESSION['carrinho'][$idProduto])){
				unset($_SESSION['carrinho'][$idProduto]);
			}
		} //Alterar Quantidade
	      if($_GET['acao'] == 'up'){
			if(is_array($_POST['prod'])){
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
	<header class="p-2">
	<body  background="../img/bg.png">
		<table border="1" class="table table-striped mt-3"> <!--mt = espacamento entre a tabela e o cabecalho-->
			<thead class="thead-dark">
				<tr>
					<th width="244" title="Produto">Produto</th>
					<th width="79" title="Quantidade">Quantidade</th>
					<th width="89" title="Preço">Preço</th>
					<th width="100" title="SubTotal">SubTotal</th>
					<th width="64" title="Remover">Remover</th>
				</tr>
			</thead>
		<form action="?acao=up" method="POST">
		<tfoot>
				<tr>
					<td colspan="5"><input type="submit" value="Atualizar Carrinho" name="prod" class="btn" title="Atualizar carrinho"></td>
				</tr>
				
				<form action="finalizarcompra.php" method="POST">
				<tr>
					<td colspan="4"><a href="loja.php" title="Continuar Comprando" class="btn btn-outline-primary"> Continuar Comprando </td>
					<td>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="teleEntrega" id="save-info">
							<label class="custom-control-label" for="save-info" title="Entregar em casa"> Entregar em casa </label>
						</div> 
					</td>	
				</tr>
			<tr>
				<td colspan="5">
					<a href="finalizarcompra.php" class="btn btn-outline-success" style="float: right;">Finalizar compra</a>
					<!--<input type="submit" class="btn btn-outline-success" value="Finalizar compra" name="compraFinal" title="Finalizar Compra" style="float: right;">--> 	
				</td>	
			</tr>		
		</tfoot>
		<tbody>
			
			<?php
				if(count($_SESSION['carrinho']) == 0){
					echo ' <tr> 
							<td colspan="5"><h5><font color="red"> Não há Produto no carrinho! </font></h5></td>
							</tr>
						';
				}
				else {
					require("../BD/conexao.php");
					$total = 0;
					$_SESSION['dados'] =  array();
					foreach($_SESSION['carrinho'] as $idProduto => $qtd) {
						$sql = "SELECT * FROM produtos WHERE idproduto = $idProduto";

						$conjuntoregistros = mysqli_query($conectado, $sql)
							or die(mysqli_error($conexao));

							$registro = mysqli_fetch_assoc($conjuntoregistros);

							$nomeProduto  = $registro['nome_produto'];

							$precoProduto = number_format($registro['preco_barril'],2,',','.');

							$sub = number_format($registro['preco_barril'] * $qtd, 2,',','.');

							$total += $registro['preco_barril'] * $qtd;
							$total2 += $registro['preco_barril'] * $qtd;
							echo '
								<tr>
								<td>'.$nomeProduto.'</td>
								<td><input type="text" size="3" name="prod['.$idProduto.']" value="'.$qtd.'" / ></td>
								<td> R$ '.$precoProduto.'</td>
								<td> R$ '.$sub.'</td>
								<td><a href="?acao=del&idproduto='.$idProduto.'" title="Remover produto do carrinho" style="float: center;">  
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFvSURBVEhLYyAEnvnYZD3zsX723MfmPzIGiv967m197omfnSFUKXngmaeVCdxgb+v3z32s38Gxt81XsGXe1hehyokD71xc+F942ygh4SqoBYvQxJWeeNqoPfO2+QT00b8nflbqyHK3PDzYoUYiwJVQLbanPtY2QFd9hrucMrz1pa+FCtR4CABaIIdFIUUYGI9boMZDwFMfexGgxCrqYusKqPGo4KWXvQQwnNMoxCFQ47ADULwAXYHV+8RiYDBdghqHHQyIJUCvH3/uZV0OTKb7oQYsB/O9re9D1fSD+MDw/w7XQ7pPrKeBxIGWtYP4L3yso0B8YEY8DOZ72umC5X2sP8D0jFoyagl2MGrJkLBkNdACY2AxMh9igE01iA9kn4fIW4VD5eGVHUFLXvhYWcIUk4sJ1vmP3CyEQHU2Ns0k4LVQ43ADYKOhD4tG4rC3zTdQCwdqFH4ADOcQYNhOAsbJTKKxt00zqNUCNQIJMDAAACjEh0JS0eNyAAAAAElFTkSuQmCC"> <?a></td>
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

					$total = number_format($total,2,',','.');
					echo '
					<tr>
					<td colspan="4">Total</td>
					<td>R$ '.$total.'</td>
					</tr>';
				}
				
				
			?>
		</form>
		</tbody>
		</table>	
		</header>
	</body>
</html>