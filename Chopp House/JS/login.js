	// var colors = [
	// 	'#c8eb02',
	// 	'#FF0000',
	// 	'#080101',
	// 	'#1d1c1c',
	// 	'#110d0d',
	// 	'#140000',
	// 	'#00000099',
	// 	'#808080'
	// ];	
	
	// function createSquare() {
	// 	const section = document.querySelector("section");
	// 	const square  = document.createElement("span");

	// 	var size = Math.random() * 50;

	// 	square.style.width  = 20 + size + 'px';
	// 	square.style.height = 20 + size + 'px';

	// 	square.style.top    = Math.random() * innerHeight + 'px';
	// 	square.style.left   = Math.random() * innerWidth + 'px';

	// 	square.style.background = colors[Math.floor(Math.random() * colors.length)];

	// 	section.appendChild(square);

	// 	setTimeout(() => { 
	// 		square.remove();
	// 	}, 4000);
	// }
	// setInterval(createSquare, 60);
	document.addEventListener("DOMContentLoaded", focusout_email);
	document.addEventListener("DOMContentLoaded", focusout_senha);

	var email          = document.querySelector(".input-email");
	var label_email    = document.querySelector('.label-email');
	var senha          = document.querySelector(".input-senha");
	var label_senha	   = document.querySelector('.label-senha');
	var input_senha    = document.querySelector('name="senha"]');
	var submit_eye     = document.querySelector('.submit-eye i');
	var invalid_login  = document.getElementById("invalid-login"); 
	var invalid_senha  = document.getElementById("invalid-senha");

	function event_focus(nameBtn) {
		if (nameBtn === "login") {
			label_email.style.top      = "-20px";
			label_email.style.color    = "#03a9f4";
			label_email.style.fontSize = "15px";
		}
		else {
			label_senha.style.top      = "-20px";
			label_senha.style.color    = "#03a9f4";
			label_senha.style.fontSize = "15px";
		}
	}	
	
	email.addEventListener('focusout', focusout_email);
	function focusout_email() {
		if (email.value.length > 0){
			label_email.style.top      = "-20px";
			label_email.style.color    = "#03a9f4";
			label_email.style.fontSize = "15px";
		}
		else {
			label_email.style.top      = "0px";
			label_email.style.color    = "#FFF";
			label_email.style.fontSize = "16px";
		}	
	}
	senha.addEventListener('focusout', focusout_senha);
	function focusout_senha() {
		if (senha.value.length > 0){
			label_senha.style.top      = "-20px";
			label_senha.style.color    = "#03a9f4";
			label_senha.style.fontSize = "15px";
		}
		else {
			label_senha.style.top      = "0px";
			label_senha.style.color    = "#FFF";
			label_senha.style.fontSize = "16px";
		}	
	}		

	submit_eye.addEventListener('click', () => {
		(input_senha.type == "password") ? input_senha.type = "text" : input_senha.type = "password";	

		if (submit_eye.classList.contains("fa-eye")) {//se tem olho aberto 
		  submit_eye.classList.remove("fa-eye"); //remove classe olho aberto
		  submit_eye.classList.add("fa-eye-slash"); //coloca classe olho fechado
		} 
		else { 
		  submit_eye.classList.remove("fa-eye-slash"); 
          submit_eye.classList.add("fa-eye"); 
		}
	});

	function verificaInput(Name) {
		if (Name == "login") { //email
			var email_dig = email.value;
			var usuario   = email_dig.substring(0, email.value.indexOf("@"));
			var dominio   = email_dig.substring(email.value.indexOf("@") + 1, email_dig.length);

			// console.log(usuario.length);
			// console.log(usuario.indexOf("."));
			// console.log(usuario.substring(usuario.length, email.value.indexOf("@")));
			

			if ((usuario.length >= 1) &&
				(dominio.length >= 3) &&
				(usuario.search("@") == -1) &&
				(dominio.search("@") == -1) &&
				(usuario.search(" ") == -1) &&
				(dominio.search(" ") == -1) &&
				(dominio.search(".") != -1) &&
				(dominio.indexOf(".") >= 1) &&
				(dominio.lastIndexOf(".") < dominio.length - 1)) {

				invalid_login.style.color = "#08b908";
				invalid_login.innerHTML   = "<small> E-mail válido. </small>";
			}
			else {
				invalid_login.style.color = "#ff2c2c";
			}
		}
		else { //senha
			var senha_dig = senha.value;

			if (senha_dig.length >= 6) { 
				invalid_senha.innerHTML   = "<small> Senha válida. </small>";
				invalid_senha.style.color = "#08b908";
			}
			else {
				invalid_senha.style.color = "#ff2c2c";
			}
		}	
	}

	function return_form() {
		var container_form = document.getElementById("formlogin");

		var erro = false;

		if (email.value.length <= 0 || senha.value.length <= 0) {
			erro = !erro;

			if (email.value.length <= 0) {
				invalid_login.style.color = "#ff2c2c";
			}	
			if (senha.value.length <= 0) {
				invalid_senha.style.color = "#ff2c2c";
			}

			container_form.classList.toggle("validate-error");
		}
		else { container_form.classList.remove("validate-error"); }
		
		if (erro) { return false; } else { return true; }
	}
