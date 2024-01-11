<?php
	error_reporting(0);
	$conectado = mysqli_connect("localhost", "root", "", "chopp_house");
	mysqli_set_charset($conectado, "utf8");

	if (!$conectado) { 
		echo "<font color='red' size='10'>Sem acesso com o banco de dados!</font>";
	}
	else echo ""; 


?>