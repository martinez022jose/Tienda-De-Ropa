<?php
function validarEspaciosVacios($nuevoUser,$pass,$file){
	if(empty($nuevoUser) || empty($pass) ||  !empty($file)){
		return true;
	}else{
		return false;
	}
}

function recorrerElementos($elementos){
	for($i=0;$i<count($elementos);$i++){
		echo $elementos[$i];
	}
}

function obtenerValores(&$nuevoUser,&$pass,&$file,$conexion){
	$nuevoUser = $_POST['nuevoUser'];
	$pass = md5($_POST['passVerificacion']);
	$file = $_POST['imgPerfil'];
}

function validarContrasenia($pass,$contraseniaDeUsuario){
	return $pass != $contraseniaDeUsuario;
}

function modificarUser($contraseniaDeUsuario,$nuevoUser,$conexion){
	$queryModificacion = "UPDATE usuario SET usuario = '$nuevoUser' 
	                      WHERE contraseña = '$contraseniaDeUsuario'";
	$result = mysqli_query($conexion,$queryModificacion);
	return $result;
}

$errores = Array();
$mensajeExitoso = Array();
$contraseniaDeUsuario = $_SESSION['contraseña'];
$nombreDeUsuario = $_SESSION['user'];
$nuevoUser;
$pass;
$file;


if(isset($_POST['cambiarPerfil'])){
	include("conexion.php");
	obtenerValores($nuevoUser,$pass,$file,$conexion);
	if(validarEspaciosVacios($nuevoUser,$pass,$file)){
		array_push($errores, "<p class='error'> Debe completar todos los espacios</p>");
	}else if(validarContrasenia($pass,$contraseniaDeUsuario)){
		array_push($errores, "<p class='error'> Contraseña incorrecta</p>.$pass.$contraseniaDeUsuario");
	}else{
		if(modificarUser($contraseniaDeUsuario,$nuevoUser,$conexion)){
			array_push($mensajeExitoso, "<p class='mensajeExitoso'>Se modifico de forma exitosa, reinicie el sistema</p>");
			

		}else{
	
		array_push($errores, "<p class='error'>No se pudo modificar</p>");
	    }
		
	}


}

recorrerElementos($errores);
recorrerElementos($mensajeExitoso);

?>