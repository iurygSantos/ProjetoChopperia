<?php require_once 'index1.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Loja de Chopps </title>
	
	<link rel="icon" type="image/jpg" href="img/choppcup.png" />
  <link rel="stylesheet" href="css/style_produtos.css">

</head>
<body background="img/back.png"> 


<div class="container--products">
  <div class="card-deck--product">
    <?php  
        $sql = "SELECT * FROM produtos";
        $conjuntoresgistros = mysqli_query($conectado, $sql) or die(mysqli_error($conectado));

      while ($registro = mysqli_fetch_assoc($conjuntoresgistros)) {
      
    ?>
        <div class="card">
          <div class="nome-produto" style="background-color: #A4A4A4;">
            <?php echo $registro['nome_produto'];?>
          </div>
            <div class="card-body">
            <?php 
              echo '<img class="imgproduto" src="imagensLoja/' . $registro['imagemProduto'].'" />';
              echo '<p class="preco"> Preço: R$ '.number_format($registro['preco_barril'], 2, ',', '.').'</p>';
              echo '<a href="carrinho.php?acao=add&idproduto='.$registro['idproduto'].'" class="btn btn-outline-primary btn-add"> Adicionar ao carrinho </a>'; 
            ?> 
          </div>
        </div>

    <?php  
      }
    ?>
  </div>
</div>
</body>
</html>