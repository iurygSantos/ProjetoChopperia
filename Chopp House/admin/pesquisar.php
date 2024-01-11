<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Loja de Chopps </title>
  <link rel="stylesheet" type="text/css" href="../css/pricing.css">	

	<?php  
	include('index1.php');
	?>

</head>
<body background="../img/back.png" style="width: 100%;">
<br>

<div class="container">
    <div class="card-deck mb-3 text-center">
<?php
include_once('../BD/conexao.php');

$pesquisar = $_POST['palavra'];
$sql = "SELECT * FROM produtos WHERE nome_produto LIKE '%$pesquisar%'";
$dados = mysqli_query($conectado, $sql);

if (mysqli_num_rows($dados) <= 0) {   
  echo "<h4><b> Nenhum registro encontrado! </b></h4>"; 
} else { 
    while ($registro_chopp = mysqli_fetch_assoc($dados)) { 
?> 
<div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">
      <?php echo  $registro_chopp['nome_produto']; ?>
    </h4>
    </div>
    <div class="card-body">
      <?php 
      echo '<img style="width: 200px; height: 200px;" src="../imagensLoja/' . $registro_chopp['imagemProduto'].'" />';
      echo '<br>';
      echo "Preço : R$".number_format($registro_chopp['preco_barril'], 2, ',', '.');
      echo "<br>" 
      ?>
      <hr />
      <?php 
      echo '<a href="carrinho.php?acao=add&idproduto='.$registro_chopp['idproduto'].'"class="btn btn-outline-primary"> Adicionar no carrinho </a>'; 
      ?>
    </div>
</div> 
<?php
    }
  } 
?>
    </div> 
</div> 
</body> 
</html>
