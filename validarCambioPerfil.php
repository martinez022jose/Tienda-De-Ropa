<?php

session_start();

function validarEspacioVacio($pass){
	if(empty($pass)){
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

function obtenerValores(&$nuevoUser,&$pass,&$archivo){
	$nuevoUser = $_POST['nuevoUser'];
	$pass = md5($_POST['passVerificacion']);

	if($archivo == null){
		'';
	}else{
		
	$ruta = "Imagenes/";
	$archivo = $_FILES['imgPerfil']['name'];
	move_uploaded_file($_FILES['imgPerfil']['tmp_name'], $ruta.$_FILES['imgPerfil']['name']);
	$archivo = $ruta.$archivo;
	}
}

function validarContrasenia($pass,$contraseniaDeUsuario){
	return $pass != $contraseniaDeUsuario;
}

function modificarUser($contraseniaDeUsuario,$nuevoUser,$file,$conexion){
	$queryModificacion;
	if($nuevoUser==""){
		$queryModificacion = "UPDATE usuario SET perfil='$file' 
	                      WHERE contraseña = '$contraseniaDeUsuario'";
	}else if($file==null){
		$queryModificacion = "UPDATE usuario SET usuario = '$nuevoUser'
	                       WHERE contraseña = '$contraseniaDeUsuario'";
	}else{
		$queryModificacion = "UPDATE usuario SET usuario = '$nuevoUser', perfil='$file' 
	                      WHERE contraseña = '$contraseniaDeUsuario'";

	}
	
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


include("conexion.php");
obtenerValores($nuevoUser,$pass,$file);
if(validarEspacioVacio($file) && validarEspacioVacio($nuevoUser)){
	array_push($errores, "<p class='error'> Debe realizar alguna modificacion</p>");
	}else if(validarEspacioVacio($pass)){
		array_push($errores, "<p class='error'> Debe completar la contraseña para confirmar</p>");
	}else if(validarContrasenia($pass,$contraseniaDeUsuario)){
		array_push($errores, "<p class='error'> Contraseña incorrecta</p>");
	}else{
		if(modificarUser($contraseniaDeUsuario,$nuevoUser,$file,$conexion)){
			array_push($mensajeExitoso, "<p class='mensajeExitoso'>Se modifico de forma exitosa, reinicie el sistema </p>");
		}else{
			array_push($errores, "<p class='error'>No se pudo modificar</p>");
	    }
		
	};

recorrerElementos($errores);
recorrerElementos($mensajeExitoso);

?>