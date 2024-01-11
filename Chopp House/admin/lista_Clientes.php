<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Lista dos clientes </title>

  <link rel="stylesheet" href="../css/style_listaCliente.css">

<?php
include('index1.php');
  $SQL_clientes   = "SELECT * FROM usuarios";
  $dados_clientes = mysqli_query($conectado, $SQL_clientes);
?>

</head>
<body background="../img/back.png">

<div class="container-lista-cliente">
  <legend> Lista dos Clientes </legend>

  <table class="table table-lightstriped table-light table-bordered">
  <thead class="thead-dark">   
      <th>#</th>
      <th>Nome dos Cliente</th>
      <th>Sobrenome</th>
      <th>Cidade</th>
      <th>Endereço</th>
      <th>Email</th>
      <th>Operações</th>
  </thead> 
<?php
  while ($registro_clientes = mysqli_fetch_assoc($dados_clientes))
  {
    if ($registro_clientes['tipo'] != 'a') 
    {
      echo 
      "<tr>".
        "<td> - </td>".
        "<td>" . $registro_clientes['nome'] . "</td>".
        "<td>" . $registro_clientes['sobrenome'] . "</td>".
        "<td>" . $registro_clientes['cidade'] . "</td>".
        "<td>" . $registro_clientes['endereco'] . "</td>".
        "<td>" . $registro_clientes['email'] . "</td>";

    echo '<td align="center"><a href="../BD/excluirClientes.php?id_usuario='. $registro_clientes['id_usuario'].'">Excluir</a></td>
    </tr>';

    } 
  }
?>
  </table>
</div>

</body>
</html>
