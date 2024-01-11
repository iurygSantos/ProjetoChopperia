<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	outline: none;
}	
.dropbtn-logar {
	width: 100%;
	height: 100%;
	margin-bottom: 9px; 
	padding: 5px;
	border: none;
	border-radius: 3px;
	font-family: Arial;
	color: white;
	letter-spacing: 1px;
	background-color: #737373;
	cursor: pointer;
	outline: none;
}

.dropdown {	
	padding: 5px; 
	position: relative;
	display: inline-block;
}

.submenu 
{
	right: 5px;
	min-width: 160px;
	position: absolute;
	border-radius: 5px;
	background-color: white;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	display: none;
	z-index: 100;
}

.submenu a 
{
	padding: 6px 10px;
	font-size: 16px;
	font-family: Verdana, Geneva, sans-serif;	
	text-decoration: none;
	background-color: white;
	color: #000000;	
	text-align: center;
	display: block;
}

#btn-cadastrar {
	border-radius: 5px 5px 0 0;
}

#btn-logarconta {
	border-radius: 0 0 5px 5px; 
}

.submenu a:hover { 
	background-color: #ffff66; 
}

.dropdown:focus, .btn-logar:focus { outline: none; }
.dropdown:hover .submenu {
	display: block;
}

.dropdown:hover .dropbtn-logar {
	background-color: #bfbfbf;
}

.submenu::before {
	content: '';
	display: block;
	position: absolute;
	margin-top: -18px;
	margin-left: 130px;

	border: 10px solid;
	border-color: transparent transparent #fff;
	z-index: 100; 
}
</style>

</head>	
<body>

	<div class="dropdown">
	  	<button class="btn-logar dropbtn-logar" title="Logar"> Logar </button>

	    <div class="submenu">
	      <a href="cadastro.php" id="btn-cadastrar"> Cadastrar-se </a>
	      <a href="login.php" id="btn-logarconta"> Logar </a>
	      <div class="l-divider"></div>
	    </div>   
	</div>  

	           
</body>
</html>