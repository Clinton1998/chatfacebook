<?php 

class Usuario{//Definiendo un molde , una plantilla, una maqueta
	//atributos
	private $usuario;
	private $contrasena;

	//metodos
	public function __construct($user,$pass){
		$this->usuario = $user;
		$this->contrasena = $pass;
	}
	//Metodos getter and setters
	public function getUser(){
		return $this->usuario;
	}
	public function getPassword(){
		return $this->contrasena;
	}

	public function setUser($u){
		$this->usuario = $u;
	}
	public function setPassword($p)
	{
		$this->password = $p;
	}

}

 ?>