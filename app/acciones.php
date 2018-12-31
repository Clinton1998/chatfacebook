<?php 
	require_once 'Usuario.inc.php';
	require_once 'Conexion.inc.php';
	require_once 'RepositorioUsuario.inc.php';
	Conexion::abrir_conexion();
	if($_POST['acceder']=="1"){//En caso de iniciar session
		$mi_usuario = new Usuario($_POST['usuario'],$_POST['password']);
		$rep = new RepositorioUsuario(Conexion::obtener_conexion(),$mi_usuario);
		$estado = $rep->iniciar_sesion();
		if($estado==0){
			echo "0";
		}else{
			echo "1";
		}
	}else{
		header("Location: ../index.html");

	}


	Conexion::cerrar_conexion();

 ?>