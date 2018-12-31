<?php 

class RepositorioUsuario{//Esto es una maquetaun molde una plantilla

	//atributos
	private $conexion;
	private $obj;

	//metodos
	public function __construct($conexion,$obj){
		if(isset($conexion)){
			$this->conexion = $conexion;
			$this->obj = $obj;
		}
	}
	public function iniciar_sesion(){
		$existe = 0;
		if(isset($this->conexion)){
			try {
				$sql = "SELECT * FROM usuarios WHERE user=:user and password=:password";
				$statement = $this->conexion->prepare($sql);
				$statement->bindParam(":user",$this->obj->getUser(),PDO::PARAM_STR);
				$statement->bindParam(":password",$this->obj->getPassword(),PDO::PARAM_STR);
				$statement->execute();
				$existe = $statement->rowCount();

			} catch (PDOException $e) {
				print "Error: ".$e->getMessage();
				die();
			}
		}
		return $existe;
	}

}

 ?>
