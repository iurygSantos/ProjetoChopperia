<?php
include('carrinho.php');
$compraFinal = $total;
$compraFinal = number_format($total, 5, ',', '.');x

#Finaliza compra
if(isset($_POST['teleEntrega'])){
	$frete = 20;
	$valorfrete = number_format($frete, 2, '.', ',');

	//$Finalizarcompra = $valorCompra;
	$total = $compraFinal + $valorfrete;
	$totalf = number_format($total, ",", ".");
	echo $totalf;
	//echo number_format($total, 2, ',', '.');
	//echo $Finalizarcompra;
}
else {
	echo $compraFinal;	
	}  
?>