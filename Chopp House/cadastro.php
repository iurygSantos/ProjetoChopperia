<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8"> 
	<title> Cadastro </title>

	<link rel="icon" type="image/jpg" href="img/choppcup.png" />
	<link rel="stylesheet" type="text/css" href="css/style_cadastro.css">

</head>
<body> 
<?php include('index1.php'); ?>

<section class="campos-cadastro">
	<form name="formcadastro" method="POST" action="BD/confirmacadastro.php" onsubmit="return verifica_form()">
	<fieldset>
		<legend> Cadastro </legend> 
		<div>
			<label>Nome</label>
			<input type="text" name="nome" id="nome">
			<div class="invalid">
			O Nome válido é obrigatório.
			</div>
		</div>
		<div class="">
			<label>Sobrenome</label>
			<input type="text" name="sobrenome" id="sobrenome"  >
			<div class="invalid">
			O sobrenome válido é obrigatório.
			</div>
		</div>


		<div class="">
		<label>CPF</label>
			<input type="text" name="cpf" id="cpf" pattern="[0-9]{11}" onkeypress="return somenteNumero()">
		</div>

		<div class="">
		<label>Data de nascimento</label>
			<input type="date" name="dataNasc" id="dataNasc" > 
		</div>

		
		<div class="">
		<label>Cidade</label>
		<select name="cidade"  id="cidade">
			<option></option>
			<option value="Julio de Castilhos">Julio de Castilhos</option>		
			<option value="Tupancireta">Tupanciretã</option>
			<option value="Santa Maria">Santa Maria</option>
			<option value="Itaara">Itaará</option> 
			<option value="Sobradinho">Sobradinho</option>
			<option value="Cruz Alta">Cruz Alta</option>  	
			<option value="Pinhal Grande">Pinhal Grande</option>	
			<option value="Salto do Jacui">Salto do Jacui</option>	
			<option value="Joia">Joia</option>	
			<option value="Faxinal do Soturno">Faxinal do Soturno</option>	
			<option value="Nova Palma">Nova Palma</option> 	
			<option value="Restinga Seca">Restinga Seca</option>
		</select> 	
		</div>

		<div class="">
		<label>Telefone</label>
		<input type="tel" name="telefone" id="telefone" pattern="^\d{2}\d{5}\d{4}$" placeholder="(xx) xxxxx-xxxx" onkeypress="return somenteNumero()">
		</div>

		
		<div class="">
			<label>Endereço</label>
			<input type="text" name="endereco" id="endereco" >
			<div class="invalid">
			O endereço válido é obrigatório.
			</div>
		</div>
		<div class=""> 
			<label>Número residêncial</label>
			<input type="text" name="numerocasa" id="numerocasa"  onkeypress="return somenteNumero()"> 
			<div class="invalid">
			O número da casa é obrigatório.
			</div>
		</div>	

		<div class="">
			<label>E-mail</label>
			<input type="email" id="email" name="email" placeholder="ex.: exemplo@gmail.com" >
			<div class="invalid">
			O E-mail é obrigatório.
			</div>
		</div>

		<a href="https://accounts.google.com/signup/v2/webcreateaccount?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail&hl=pt-PT&flowName=GlifWebSignIn&flowEntry=SignUp" target="blank" class="link-google"> Caso você não possua uma conta no Google crie uma clicando aqui!</a> 
		
		<div class="div-senhas"> 
			<div class="div-senha">
				<label>Senha</label>
				<input type="password" name="senha" id="senha" minlength="8" >
			</div>
			<div class="div-confirma-senha">
				<label>Confirmar senha</label>
				<input type="password" name="confirma_senha" id="confirma_senha" minlength="8" >
			</div>
		</div>

		<input type="submit" name="cadastrar" value="Cadastrar"> 	
	</fieldset>
	</form>
</section>

<script type="text/javascript">
	function somenteNumero(evt) {
	   var theEvent = evt || window.event;
	   var key = theEvent.keyCode || theEvent.which;
	   key = String.fromCharCode( key );
	   //var regex = /^[0-9.,]+$/;
	   var regex = /^[0-9.]+$/;
	   if( !regex.test(key) ) {
	      theEvent.returnValue = false;
	      if(theEvent.preventDefault) theEvent.preventDefault();
	   }
	}
	var cpf = document.querySelector("#cpf");

	cpf.addEventListener("blur", function(){
	cpf.value = cpf.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/,"-");
	});

	var erro = false;

	function verifica_form(){
		var nome = document.getElementById("nome").value;
		var nomeL = nome.lenght;

        if (nomeL >= 3) 
        {
        	console.log(nomeL);
        	erro = true;
        } 
        else {
        	console.log(nomeL);
        	erro = false;
        }		
	
		if (erro == false) { return true; } 
		else { return false; }
	
	}

</script>
<script src="cadastro.js"></script>
</body> 
</html>