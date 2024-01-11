<?php
include('../BD/conexao.php');

    $email = $_SESSION['login']; 
      $sql_usu = "SELECT * FROM usuarios Where email = '$email'";
      $result_usu = mysqli_query($conectado, $sql_usu);

      $usuario = mysqli_fetch_array($result_usu);
      
if ($email != "admin@gmail.com") {
  header("location: ../index.php");
} else {
?> 
  <link rel="stylesheet" href="../css/menu_logado.css">
    <div class="dropdown">
        <button class="btn-usuario dropbtn-usuario">
          <?php echo $usuario['nome']; ?>
        </button>

        <div class="submenu">
          <p id="email"> <?php echo $usuario['email']; ?> </p>
          <div class="row-divider"></div>
          <!-- <a class="btn-item" href="dadoscliente.php"> Dados Pessoais </a>    -->
          <a class="btn-item" href="sair_conta.php?act=logado"> Deslogar </a> 
        </div>   
    </div> 
<?php 
} 
?>  



   
                