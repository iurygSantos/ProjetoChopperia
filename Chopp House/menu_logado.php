<?php
  session_start();
  require_once 'BD/conexao.php';

    $email = $_SESSION['login']; 
    $sql_usu = "SELECT * FROM usuarios Where email = '$email'";
    $result_usu = mysqli_query($conectado, $sql_usu);

    $usuario = mysqli_fetch_array($result_usu);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/menu_logado.css">

</head> 
<body>

  <div class="dropdown">
      <button class="btn-usuario dropbtn-usuario">
        <?php echo $usuario['nome']; ?>
      </button>

      <div class="submenu">
        <p id="email"> <?php echo $usuario['email']; ?> </p>
        <div class="row-divider"></div>
        <a class="btn-item" href="dadoscliente.php"> Dados Pessoais </a>   
        <a class="btn-item" href="sair_conta.php?act=logado"> Deslogar </a> 
      </div>   
  </div>  
             
</body>
</html>                  