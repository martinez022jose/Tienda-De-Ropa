<?php

function recorrerElementos($elementos){
	for($i=0;$i<count($elementos);$i++){
		echo $elementos[$i];
	}
}

function validarEspaciosVacios($user,$contraseña){
	if(empty($user) && empty($contraseña)){
		return true;
	}else{
		return false;
	}
}

include("conexion.php");

$errores = Array();

if(isset($_POST['submit'])){
	$user = mysqli_real_escape_string($conexion,$_POST['nombreDeUsuario']);
	$contraseña = md5(mysqli_real_escape_string($conexion,$_POST['contraseñaDeUsuario']));

	if(validarEspaciosVacios($user,$contraseña)){
		array_push($errores, "<p class='errorUser'> Debe completar todos los espacios</p>");
	}else{
		$queryBusqueda = "SELECT *FROM usuario WHERE usuario = '$user' AND contraseña = '$contraseña'";
	    $posiblesUsuarios = mysqli_query($conexion,$queryBusqueda);
	    mysqli_close($conexion);
	    
	    $cantidadDeUsuarios = mysqli_num_rows($posiblesUsuarios);
	    if($cantidadDeUsuarios>0){

	    	$_SESSION['activo'] = true;
	    	$_SESSION['user'] = $user;
	    	$_SESSION['contraseña'] = $contraseña;
	    	
		    header("location:controlProductos.php");

	    }else{
		    array_push($errores,"<p class='errorUser'> Usurio o contraseña incorrecta");
		    session_destroy();

	    }

	}

	

}

recorrerElementos($errores);



?>