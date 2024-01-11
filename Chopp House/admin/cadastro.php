<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8"> 
	<title> Cadastro </title>

	<link rel="icon" type="image/jpg" href="../img/choppcup.png" />

</head>
<body background="img/BG.png"> 
	
	<?php  
	include('index1.php');

	if (isset($_SESSION['msgidade'])) {
		echo $_SESSION['msgidade'];
		session_unset();
	}
	?>
<font size="3" face="times">

<br>	
<div class="alert alert-success" align="center" role="alert">
	<h3 style="color: red;"> Atenção! </h3>
  	<h5> Preencha todos os campos para se cadastrar! </h5>
</div>

<br>
<center>
	<legend><h1><b> Cadastro </b></h1></legend> <br>
<form name="cadastro.php" method="POST" action="confirmacadastro.php">

<div class=" ">    <!--col-md-8 order-md-1-->
	<div class="col-md-4 mb-3">	
			<div class="row">
              <div class="col-md-6 mb-2">
                <h4>Nome</h4>
                <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" maxlength="20" required autofocus id="nome">
                <div class="invalid-feedback">
                  O Nome válido é obrigatório.
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <h4>Sobrenome</h4>
                <input type="text" name="sobrenome" class="form-control" placeholder="Digite seu sobrenome" maxlength="20" required id="sobrenome">
                <div class="invalid-feedback">
                  O sobrenome válido é obrigatório.
                </div>
              </div>
            </div>

            <div class="mb-2">
			<h4>CPF</h4>
				<input type="number" name="cpf" class="form-control d-block w-80" onkeypress="formatar('###.###.###-##',this)" minlength="11" maxlength="12" placeholder="000.000.000-00" required id="cpf">
			</div>

			<div class="mb-2">
			<h4>Data de nascimento</h4>
				<input type="date" name="dataNasc" class="form-control d-block w-80" required id="dataNasc"> 
			</div>

		<!---------------------------selecionar cidade-------------------------------------------->	
		<div class="row">	
			<div class="col-md-6 mb-2">
			<h4>Cidade</h4>
			<select name="cidade" class="custom-select d-block w-80" required id="cidade">
				<option value="escolher">...</option>
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

			<div class="col-md-6 mb-2">
			<h4>Telefone</h4>
			<input type="tel" pattern="^\d{2}\d{5}\d{4}$" class="form-control d-block" name="telefone" placeholder="(xx) xxxxx-xxxx" required id="telefone">
			</div>
		</div>
			
			<div class="row">
              <div class="col-md-6 mb-2">
                <h4>Endereço</h4>
                <input type="text" name="endereco" class="form-control" placeholder="Nome da rua" maxlength="20" required id="endereco">
                <div class="invalid-feedback">
                  O endereço válido é obrigatório.
                </div>
              </div>
              <div class="col-md-6 mb-2"> 
              	<h4>Número residêncial</h4>
                <input type="number" name="numerocasa" class="form-control" placeholder="N° da casa" maxlength="20" required id="numerocasa">
                <div class="invalid-feedback">
                  O número da casa válido é obrigatório.
                </div>
              </div>
            </div>	

            <div class="mb-2">
              <h4>E-mail</h4>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="email" class="form-control d-block w-80" id="email" name="email" placeholder="ex.: exemplo@gmail.com" required>
                <div class="invalid-feedback" style="width: 100%;">
                  O E-mail deve é obrigatório.
                </div>
              </div>
            </div>

			<a href="https://accounts.google.com/signup/v2/webcreateaccount?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail&hl=pt-PT&flowName=GlifWebSignIn&flowEntry=SignUp" target="blank" style="color: blue"><b> <font size="2"> Caso você não possua uma conta no Google crie uma clicando aqui! </font></b></a> <br>
			
			<div class="mb-2"> 
			<h4>Senha</h4>
			 <input type="password" class="form-control d-block w-80" name="senha" minlength="8" placeholder="Crie uma senha com pelo menos 8 caracteres" required id="senha"> <br>
			</div>

			<input type="submit" name="Cadastrar-se" value="Cadastrar" class="btn btn-success mb-3"> 	
	</div>
	</div>
</div>
	</form>	
</center>
</font>
</body> 
</html>