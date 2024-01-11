<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Loja de Chopps </title>

  <link rel="icon" type="image/jpg" href="img/choppcup.png">

  <link rel="stylesheet" type="text/css" href="css/style_produtos.css">	

<!---------Gif que ira aparecer--------------->
<style type="text/css">
  .corpo {
    display: none;
  }
  .carregando {
    position: fixed;  
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: url(img/loading.gif) 50% 50% no-repeat;
  }
</style>

</head>
<body background="img/back.png">

<div class="carregando" id="carregando"></i> </div>
  <div class="corpo" id="corpo">

<?php require_once ('index1.php'); ?>
  
  <div class="container--products">
    <div class="card-deck--product">

<?php

  $pesquisar = $_POST['palavra'];
  $sql = "SELECT * FROM produtos WHERE nome_produto LIKE '%$pesquisar%'";
  $dados = mysqli_query($conectado, $sql);

  if (mysqli_num_rows($dados) <= 0) {
    echo "<h4><b> Nenhum registro encontrado! </b></h4>";
  } else { 
      while ($registro = mysqli_fetch_assoc($dados)) {
  ?>
        <div class="card">
          <div class="nome-produto" style="background-color: #A4A4A4;">
            <?php echo $registro['nome_produto'];?>
          </div>
            <div class="card-body">
            <?php 
              echo '<img class="imgproduto" src="imagensLoja/' . $registro['imagemProduto'].'" />';
              echo '<p class="preco"> Preço: R$ '.number_format($registro['preco_barril'], 2, ',', '.').'</p>';
            ?>
             <?php echo '<a href="carrinho.php?acao=add&idproduto='.$registro['idproduto'].'" class="btn btn-outline-primary btn-add"> Adicionar ao carrinho </a>'; ?> 
          </div>
        </div>
  <?php  
      }  
    }
  ?>      
    </div>
  </div>
</div>

<!--------------carregando..----------------->
<script type="text/javascript">
//demora um tempo(que coloquei) para aparecer a pagina  
  var intervalo = setInterval(function (){
  clearInterval(intervalo);

  document.getElementById("carregando").style.display = "none";
  document.getElementById("corpo").style.display = "block";
  },2000 );
</script>

</body>
</html>