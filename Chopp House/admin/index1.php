<?php session_start(); 

include('../BD/conexao.php');

  if (!isset($_SESSION['login'])) 
  { echo "<script> alert('Você não tem permissão para acessar essa página!');
    window.location.replace('../index.php'); </script>!"; 
  }
  else 
  {
    $SQL = "SELECT tipo FROM usuarios WHERE id_usuario = ".$_SESSION['login'];
    $result_sql = mysqli_query($conectado, $SQL); 

    if ($result_sql['tipo'] == 'c')  
    { echo "<script> alert('Você não tem permissão para acessar essa página!');
    window.location.replace('../index.php'); </script>!"; 
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> House Chopp Beer </title>

    <link rel="icon" type="image/jpg" href="../img/choppcup.png">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/style_index1.css">

</head>
<body>

<img src="../img/capa_nova.png" id="title">

  <header class="cabecalho"> 
    <a href="index.php">
      <input id="icon-chopp" type="image" src="../img/choppcup.png">
    </a> 
    <div class="menu-opcao">  
      <ul>
        <li>
          <a href="index.php" title="Página inicial" id="btnPI"> Página inicial </a>
        </li>
        <li>
          <a href="loja.php" title="Loja" id="btnLoja"> Loja </a>
        </li>  
        <li>
          <a href="lista_Vendas.php" title="Vendas" id="btnVenda"> Vendas </a>
        </li> 
        <li>
          <a href="lista_Clientes.php" title="Clientes" id="btnCliente"> Clientes </a>
        </li>         
      </ul> 
    </div>
    
    <div class="div-busca">
      <form method="POST" action="pesquisar.php"> 
        <fieldset>
          <input type="search" id="search" name="palavra" placeholder="O que você esta buscando?" onmouseout="event_Search();">
          <span id="icon-search">
            <i class="fa fa-search" aria-hidden="true" onclick="onclick_icon()"></i>
          </span>
        </fieldset>
      </form>
    </div>    
     
    <a href="carrinho.php" class="icon-carrinho" title="Carrinho de compras">
      <i class="fas fa-cart-plus"></i>
    </a>  

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

    <button class="btn_menu"><i class="fas fa-bars" id="icon_btn_menu"></i></button>
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

<script>
  window.addEventListener("online", onFunction);
  window.addEventListener("offline", offFunction);

  function onFunction() {
    alert ("Você está online novamente.");
  }

  function offFunction() {
    alert ("Você está sem internet e estará navegando ofline!");
  } 

  /*evento da caixa de busca*/  
  var ElementSearch = document.getElementById("search");
  var ElementIconSearch = document.getElementById("icon-search");
  
  function onclick_icon() { 
    if (ElementSearch.style.display == 'none') {
      ElementSearch.style.display = 'block';
      ElementSearch.focus();
    } else {
      ElementSearch.blur();                                             
      ElementSearch.style.display = 'none';
    }   
  }

  /* evento que o ElementSearch soma ao sair com o ponteiro fora do input
  function event_Search() { 
    ElementSearch.blur();
    ElementSearch.style.display = 'none';
  }
  */
  ElementSearch.addEventListener("focusout", click_focusout);
  function click_focusout() { 
    ElementSearch.style.display = 'none';
  }
 
</script> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>
</html> 