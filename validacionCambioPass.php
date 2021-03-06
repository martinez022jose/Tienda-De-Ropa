<?php

session_start();

function recorrerElementos($elementos){
	for($i=0;$i<count($elementos);$i++){
		echo $elementos[$i];
	}
}

function validarEspaciosEnBlanco($passNueva,$confPass){
	if(empty($passNueva) || empty($confPass)){
		return true;
	}
	else{
		return false;
	}
}

function obtenerValores(&$passNueva,&$confPass){
	$passNueva = $_POST['nuevaPass'];
	$confPass = $_POST['confPass'];
}

function sonIguales($passNueva,$confPass){
	return $passNueva == $confPass;
}

function modificarPass(&$passNueva,$user,$conexion){
	$passNueva = md5($passNueva);
	$queryModificacion = "UPDATE usuario SET contraseña = '$passNueva' WHERE usuario = '$user'";
	$resultInsert = mysqli_query($conexion,$queryModificacion);
	return $resultInsert;
}

$user = $_SESSION['user'];
$errores = Array();
$mensajeExitoso = Array();
$passNueva;
$confPass;

obtenerValores($passNueva,$confPass);
if(validarEspaciosEnBlanco($passNueva,$confPass)){
	array_push($errores, "<p class='errorPass'>Debe completar todos los espacios</p>");}
	else if(sonIguales($passNueva,$confPass)){
		include("conexion.php");
		modificarPass($passNueva,$user,$conexion);
		mysqli_close($conexion);
		array_push($mensajeExitoso,"<p class='mensajeExitosoPass'>Se cambio exitosamente</p>");
	}else{
		array_push($errores,"<p class='errorPass'>Debe coincidir contraseñas</p>");
	}

recorrerElementos($errores);
recorrerElementos($mensajeExitoso);

?>