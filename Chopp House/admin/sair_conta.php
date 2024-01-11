<?php  
session_start();
#sai da sua conta de login

if(isset($_SESSION['login'])) {
session_destroy();
header("location: ../index.php");
exit;
}

?>