<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Compra concluída</title>

	<?php  
	include('index1.php');
	?>

</head>
<body background="img/back.png">
<br>

<header class="p-3">
<?php
session_start();
$con = mysqli_connect("localhost","root","","chopp_house");
$data = date("Y-m-d");

//recebe o session login
$login = $_SESSION['login'];
#------------------------------------------------------
$sqladmim = "SELECT * FROM usuarios WHERE email = 'admin'";
$resultAdmin = mysqli_query($con, $sqladmim);

$id_admin = mysqli_fetch_array($resultAdmin);
$celAdmin = $id_admin['telefone_usuario'];
#-------------------------------------------------------	
//puxa o id do cliente
$sql_id = "SELECT * FROM usuarios WHERE email ='$login'";
$result_id = mysqli_query($con, $sql_id);

$id_cliente = mysqli_fetch_array($result_id);
$id = $id_cliente['id_usuario'];
#-------------------------------------------------------
/*No lugar do "1" no insert, ele irá salvar na tabela 'vendas' o id do usuario e a data da venda.
 Após isso, o programa ira iserir na tabela 'itens_venda'.*/
$total = $_SESSION['total'];

if ($_POST['teleEntrega']) {
	$entregar_em_casa = "S";
} else {
	$entregar_em_casa = "N";
}

$sql = "INSERT INTO vendas VALUES (null, $id, '$data','$entregar_em_casa','$total')";
$inserir = mysqli_query($con, $sql);

$ultimoID = mysqli_insert_id($con);


	foreach ($_SESSION['dados'] as $produtos) {
		$sqlEstoque = "SELECT estoque FROM produtos WHERE idproduto =". $produtos['idproduto'];

		$selectEstoque = mysqli_query($con, $sqlEstoque);
		$Registro = mysqli_fetch_assoc($selectEstoque); 
		$novoEstoque = $Registro['estoque'] - $produtos['quantidade'];
		$sqlUpdate = "UPDATE produtos SET estoque =".$novoEstoque."  WHERE idproduto =".$produtos['idproduto'];
		$atualizar = mysqli_query($con, $sqlUpdate);

		$conexao = new PDO('mysql:host=localhost;dbname=chopp_house',"root","");
		$insert = $conexao->prepare("
			INSERT INTO itens_venda VALUES (NULL, ?, ?, ?, ?)");
		$insert ->bindParam(1,$produtos['idproduto']);
		$insert ->bindParam(2,$ultimoID);
		$insert ->bindParam(3,$produtos['quantidade']);
		$insert ->bindParam(4,$produtos['total']);
		$insert->execute();
	}
?>

<center>
	<div class="card" style="width: 65rem;height: 33rem;" style="background-color: red;">
	  <div class="card-body">
	    <font color="green">
	    	<h2 class="card-title"> Pedido concluído com sucesso! </h2>
	    </font>
	    <p class="card-text">  
<?php  

	$sqlCliente = "SELECT * FROM usuarios WHERE id_cliente=".$id;
	$ConsultarNome = mysqli_query($con, $sqlCliente);
	$RegistroNome = mysqli_fetch_assoc($ConsultarNome);

?>
	<table class="table table-striped">
		<thead class="table-dark">
			 <tr>
			 	<td>Nome</td>
			 	<td>Sobrenome</td>
			 	<td>Endereço</td>
			 	<td>Nome do Produto</td>
			 	<td>Preço</td>
			 	<td>Quantidade</td>
			 	<td>Data da compra</td>
			 </tr>
		</thead>	 

<?php		
			foreach ($_SESSION['dados'] as $produtos) {

				$sqlProduto = "SELECT * FROM produtos WHERE idproduto=".$produtos['idproduto'];
				$ConsultarProduto = mysqli_query($con, $sqlProduto);
				$RegistroProduto = mysqli_fetch_assoc($ConsultarProduto);

				echo "<tr>
						<td>".$RegistroNome['nome_cliente']."</td>
						<td>".$RegistroNome['sobrenome_cliente']."</td>
						<td>".$RegistroNome['endereco_cliente']."</td>
						<td>".$RegistroProduto['nome_produto']."</td>
						<td>".$RegistroProduto['preco_barril']."</td>
						<td align='center'>".$produtos['quantidade']."</td>
						<td>".date("d/m/Y")."</td>
					</tr>";
					
			} 
?>
	</table><br>

<?php 
	echo "Nome do comprador: ".$RegistroNome['nome_cliente']." ".$RegistroNome['sobrenome_cliente'].". <br>
	Data da compra: ".date("d/m/Y").".<br>
	Valor total a pagar: R$ ". $total.".<br>
	 <br>
	A entrega do pedido será feita no endereço ".$RegistroNome['endereco_cliente']." no prazo de 5 dias, caso não for entregue entre em contado conosco pelo número (55)99962-2915. <br>"; 
?>

	<br>
		</p>
	<font color="red"><h5> Enviaremos maiores informações para seu E-mail ou entraremos em contato em caso de problemas! </h5></font>
<a href="img/Boleto_cliente.png" style="float: right;" class="btn btn-outline-primary" download> Baixar boleto 
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEySURBVDhP7ZSxSgQxFEVnEcTKD3F/xNbC2s5GwUbUQvMKC8G8DCzYWLrgFiMsKv6AtTb6AYI/IDYiiBpv5M6smuyaXVsv3GIy950kkzcphkmsnTNWr8Tqq6jzwUb1SazricgMY/ky6i5rUGxdZyxfKHyIQY27jOULRY8/II2x9WPG8oXCf+CYwO2ybKPHqoH1JQULBvC+zqFXjwrvW8QMtFhVU8a6sxRgtHWDiFj4A6YROE8XpqxbLB0uQk/TgK8e428ZCbX6jm+4xmi+CO0nYCuMpIWDONzZdwt8/KYAxSVxQhhuHV3mq0g4cQOvhn7zgO5xPBJPf1Ocm+dQUpjwFqyLX4G5aoDY0jOWesDxiVU3O1aofUDf4BvMcD2h72DstFwqpNOZBX030P/g3ifM+9YHPovbE0rnkRsAAAAASUVORK5CYII=">	
</a>
	  </div>
	</div>
</center>
	<a href="index.php" style="margin-top: 6%;" class="btn btn-outline-light" style="color: white;"> Voltar a pagina inicial </a>
</header>

</body>
</html>