<?php require_once 'index1.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Login </title>

	<link rel="icon" type="image/jpg" href="img/choppcup.png" />
	<link rel="stylesheet" href="css/style_login.css">

</head>
<body background="img/bg.png">

<section>
<div class="block">
	<div class="container-login" id="formlogin">		
		<form name="form_login" method="POST" action="verific_usuario.php" onsubmit="return return_form()">
			<fieldset>	
				<legend> Login </legend> 
				
				<div class="input-form">
					<input type="email" name="login" value="<?php echo $_SESSION['login_erro']; ?>" class="input-email" onfocus="event_focus(this.name)" onblur="verificaInput(this.name)" autocomplete="off"> 
					<label class="label label-email">E-mail</label> 
					<div id="invalid-login"> <small> O Nome é obrigatório. </small> </div>
				</div>	
				<div class="input-form">
					<input type="password" name="senha" value="<?php echo $_SESSION['senha_erro']; ?>" class="input-senha" minlength="6" onfocus="event_focus(this.name)" onblur="verificaInput(this.name)" maxlength="8">
					<label class="label label-senha">Senha</label>
					<div class="submit-eye"><i class="fas fa-eye"></i></div>
					<div id="invalid-senha"> <small> A senha é obrigatório. </small> </div>
				</div>

				<button class="btn-login" name="logar">Logar</button>
			</fieldset>	
		</form>	
	</div>
</div>

</section>

<script type="text/javascript" src="JS/login.js"></script>		
</body>
</html>

