<?php
session_start();
	echo "<pre>";
	var_dump($_SESSION['dados']);
	echo "<pre>";
$con = mysqli_connect("localhost","root","","chopp_house");
$data = date("Y-m-d");

$login = $_SESSION['login'];

//puxa o id do cliente
$sql_id = "SELECT * FROM usuarios WHERE email ='$login'";
$result_id = mysqli_query($con, $sql_id);

$id_cliente = mysqli_fetch_array($result_id);
$id = $id_cliente['id_cliente'];
#-------------------------------------------------------

/*No lugar do "1" no insert, ele tera que colocar o id do usuario,
 talvez com o login, ou n sei, e irá salvar na tabela 'vendas'.
 Após isso, o programa ira iserir no itens venda.*/


$sql = "INSERT INTO vendas VALUES ( null, $id, '$data')";
//echo $sql;

$inserir = mysqli_query($con, $sql);

$ultimoID = mysqli_insert_id($con);


	foreach ($_SESSION['dados'] as $produtos) {
		$sqlEstoque = "SELECT estoque FROM produtos WHERE idproduto=".$produtos['idproduto'];

		$selectEstoque = mysqli_query($con, $sqlEstoque);
		$Registro = mysqli_fetch_assoc($selectEstoque);
		$novoEstoque = $Registro['estoque'] - $produtos['quantidade'];
		$sqlUpdate = "UPDATE produtos SET estoque=".$novoEstoque."WHERE idproduto=".$produtos['idproduto'];
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

	echo "<font size='20' color='green'>Pedido Salvo com sucesso DISGRAAAAÇA!!!!!</font>"."<br>";
	echo "<a href='index.php'>Voltar a pagina inicial</a>";
	
?>