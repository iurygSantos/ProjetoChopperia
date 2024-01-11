<?php session_start(); 
  require_once 'BD/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-en">
<head>
    <meta charset="utf-8">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, shrink-to-fit=no">
    <title> House Chopp Beer </title>

    <link rel="icon" type="image/jpg" href="img/choppcup.png">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style_index1.css">

</head>
<body>
  <div id="title">
    <img src="img/capa_nova.png">
  </div>
  
  <header class="cabecalho"> 
    <div class="container-cabecalho">

      <div class="divMenu">
        <div id="icon-chopp">
          <a href="index.php"><img src="img/choppcup.png"/></a>
        </div>  
        <div class="menu-opcao">  
          <nav>
            <ul>
              <li>
                <a href="index.php" title="Página inicial" id="btnPI"> Início </a>
              </li>
              <li>
                <a href="loja.php" title="Loja" id="btnLoja"> Loja </a>
              </li>           
            </ul>
          </nav>   
        </div>
      </div>

      <div class="divBCL">
        <div class="div-busca">
          <form method="POST" action="pesquisar.php"> 
            <fieldset>
                  <input type="search" id="search" name="palavra">
                  <span id="icon-search">
                    <i class="fa fa-search" aria-hidden="true" onclick="click_iconSearch()"></i>
                  </span>
            </fieldset>
          </form>
        </div> 

        <div class="div-IconCar">
          <a href="carrinho.php" title="Carrinho de compras"><i class="fas fa-cart-plus"></i></a>
        </div>
                    
        <div id="div-btnlogin">
          <?php  
            if (isset($_SESSION['login'])) {
              # menu quando ele ta logado
              include_once('menu_logado.php');
            } else {
              #menu quando ele estiver deslogado
              include_once('menu_deslogado.php');  
            }
          ?>
        </div>  
        
        <button class="btn_menu_mobile"><i class="fas fa-bars" id="icon_btn_menu"></i></button> 
      </div>
    </div>  
  </header>  
<!-- 
  <div class="menu">  
      <ul>
        <li>
          <a href="index.php" title="Página inicial"> Página inicial </a>
        </li>
        <li>
          <a href="loja.php" title="Loja"> Loja </a>
        </li>           
      </ul> 
  </div> -->    

  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="JS/index1.js"></script> 

</body>
</html>  