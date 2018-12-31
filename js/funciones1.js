$(document).ready(function(){//No ese ejecuta hasta que el DOM se dibuje


	$("#btn-form-login").on("click",function(){
		traer_formulario("plantillas/form-login.html");
	});
	$("#btn-form-register").on("click",function(){
		traer_formulario("plantillas/form-register.html");
	});

});

function traer_formulario(directorio){

	$.ajax({
		url: directorio,
		type: "post",
		data: "1",
		beforeSend: function(){
			console.log("Se esta procesando tu solicitus");
		}


	}).done(function(data){
		$("#changecontent").html(data);
		$("#btn-iniciar").click(function(){
			validar_datos_login();
		});
	});
}

function validar_datos_login(){
	removerElemento(".error");
	var $usuario = $("#usuario");
	var $contrasena = $("#contrasena");
	var estabien = 1;

	if($usuario.val()==""){
		estabien = 0;
		$usuario.after("<p class='error'> Falta usuario</p>");
	}

	if($contrasena.val()=="")
	{
		estabien = 0;
		$contrasena.after("<p class='error'> Falta contraseña</p>");
	}

	if(estabien){
		//Aqui hacemos la peticion al server que funcionara con php
		enviar_datos_inicio($usuario.val(),$contrasena.val());

	}
ponerIcono(".error","glyphicon glyphicon-alert");
}

function ponerIcono(selector,clase){
	$(selector).prepend("<span class='"+clase+"'></span>");
}
function removerElemento(selector){
	$(selector).remove();
}

function enviar_datos_inicio(user,password){
	var datos = {
		"usuario": user,
		"password": password,
		"acceder": "1"
	}

	$.ajax({
		url: "app/acciones.php",
		type: "post",
		data: datos,
		beforeSend: function(){
			console.log("Se esta enviando los datos");
		}
	}).done(function(data){
		if(data=="1"){
				$("#ultimogrupo").after("<div class='form-group'><p class=''>Bievenido</p></div>");
		}else if(data=="0"){
				$("#ultimogrupo").after("<div class='form-group'><p class='error'>Usuario o contraseña incorrecta</p></div>");

		}else{
			$("#ultimogrupo").after("<div class='form-group'><p class='error'>Problema en la peticion al servidor</p></div>");
		}
	});
}

