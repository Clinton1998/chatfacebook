<?php

 class Conexion {

 	//atributos
 	private static $conexion;

 	//metodos
 	public static function abrir_conexion(){
 		if(!isset(self::$conexion)){
 			try {

				include_once 'config.inc.php';
 				self::$conexion=new PDO("mysql:host=$nombre_servidor; dbname=$nombre_base_datos",$nombre_usuario,$password);
 				self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 				self::$conexion->exec("SET CHARACTER SET utf8");//Establecmo una consulta con la coddifficacion de caracteres


 			} catch (PDOException $e) {
 						//imprimimos si fall
 				print "Error: ".$e->getMessage();
 			}
 		}
 	}
 	public static function cerrar_conexion(){
 		if(isset(self::$conexion)){
 			self::$conexion=null;//eliminamos el valor del atributo
 		}
 	}
 	public static function obtener_conexion(){
 		return self::$conexion;
 	}


 }

 ?>