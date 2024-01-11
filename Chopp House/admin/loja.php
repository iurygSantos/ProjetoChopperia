<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Loja de Chopps </title>
	
  <link rel="stylesheet" href="../css/style_produtos.css">

	<link rel="icon" type="image/jpg" href="../img/choppcup.png" />
  
</head>
<body background="../img/back.png"> 

<?php include('index1.php'); ?>

<div class="container">
  <div class="card-deck">
<?php  
    include_once("../BD/conexao.php");

    $sql = "SELECT * FROM produtos";
    $conjuntoresgistros = mysqli_query($conectado, $sql) or die(mysqli_error($conectado));
?>

<?php
    while ($registro = mysqli_fetch_assoc($conjuntoresgistros)) { 
?>
      <div class="card" >
        <div class="nome-produto" style="background-color: #A4A4A4;">
          <?php echo  $registro['nome_produto']; ?>
        </div>
        <div class="card-body">
        <?php 
          echo '<img class="imgproduto" src="../imagensLoja/' . $registro['imagemProduto'].'" />';
          echo '<p class="preco"> Preço: R$'.number_format($registro['preco_barril'], 2, ',', '.'); 
          echo '<a href="../BD/editarproduto.php?idproduto='.$registro['idproduto'].'" class="btn btn-outline-primary"> Editar produto </a>'; 
        ?>
           
        </div>
        <div>
          <a href="../BD/excluirproduto.php?idproduto=<?php echo $registro['idproduto'] ?>" class="btn btn-outline-danger mb-3" name="dellproduto" title="Excluir produto"> Excluir produto </a>
        </div>
      </div>
<?php  
  }
?>
</div>
</div>
</header>

<hr />
<!--adiciona produto-->
<form method="GET" action="../BD/adicionarproduto.php">
<header style="float: left;">  
<div class="container-addproduto">
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
          <div class="card-header" style="background-color: #A4A4A4;">
            Nome do produto:<h4 class="my-0 font-weight-normal"> <input type="text" name="nomeproduto" class="form-control"> </h4>
          </div>
          <div class="card-body">
              Imagem do chopp:<br><input type="file" name="image" class="form-control">  
            <br>
            Preço do litro: R$ <input type="float" name="precolitro" class="form-control">
            Preço do barril: R$ <input type="float" name="precobarril" class="form-control">
            <input type="submit" class="btn btn-outline-primary" name="addproduto" title="Adicionar produto" value="Adicionar produto">
          </div>
        </div>  
    </div>
</div>
</header>
</form>

<?php
    $SQL2 = "SELECT * FROM produtos";
    $dados = mysqli_query($conectado, $SQL2);
?>

<header class="p-1">
  <table style="background-color: white;" border='2' align="center">
  <th>#</th>
    <th>Nome do Produto</th>
    <th>Estoque</th>
    <th>Preço barril</th>
    <th>Operação</th>
<?php
  while ($registro = mysqli_fetch_assoc($dados)){
    echo "<tr>".
          "<td>" . $registro['idproduto'] . "</td>".
          "<td>" . $registro['nome_produto'] . "</td>".
          "<td>" . $registro['estoque'] . "</td>".
          "<td>" . number_format($registro['preco_barril'], 2 , ',', '.') . "</td>";
?>
  <td align="center"><a href="../BD/AdicionarEstoque.php?idproduto=<?php echo $registro['idproduto']?>">Adicionar Estoque</a></td>
  </tr>
<?php
  }
?>
</table>
</header>
<br>
</font> 
</body>
</html>