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
	$user = $_POST['nombreDeUsuario'];
	$contraseña = $_POST['contraseñaDeUsuario'];

	if(validarEspaciosVacios($user,$contraseña)){
		array_push($errores, "<p class='error'> Debe completar todos los espacios</p>");
	}else{
		$queryBusqueda = "SELECT *FROM usuario WHERE usuario = '$user' AND contraseña = '$contraseña'";
	    $posiblesUsuarios = mysqli_query($conexion,$queryBusqueda);
	    $cantidadDeUsuarios = mysqli_num_rows($posiblesUsuarios);

	    if($cantidadDeUsuarios>0){
		    header("controlProductos.php");
	    }else{
		    array_push($errores,"<p class='error'> Usurio o contraseña incorrecta");

	    }

	}

	

}

recorrerElementos($errores);



?>