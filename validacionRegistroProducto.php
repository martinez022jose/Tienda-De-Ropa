<?php
$errores = Array();
$mensajeExitoso = Array();
$codigoProd;
$nombreProd;
$precioProd;
$descProd;
$imgProd;


obtenerValores($codigoProd,$nombreProd,$precioProd,$descProd,$imgProd);
	
if(validarEspaciosVacios($codigoProd,$nombreProd,$precioProd,$descProd,$imgProd)){
		array_push($errores, "<p class='error'> Debe completar todos los campos</p>");
}else{
		include("conexion.php");
		if(!validarExistenciaSegun($codigoProd,$nombreProd,$conexion)){
			insertarProducto($codigoProd,$nombreProd,$precioProd,$descProd,$imgProd,$conexion);
			array_push($mensajeExitoso,"<p class='mensajeExitoso'> Se ha insertado de manera correcta </p>");
			
		}else{
			array_push($errores,"<p class='error'> Codigo o nombre de producto ya existe</p>" );
		}

}

	if(count($errores)>0){
		recorrerElementos($errores);
	}else{
	recorrerElementos($mensajeExitoso);
	}


function validarEspaciosVacios($codigoProd,$nombreProd,$precioProd,$descProd,$imgProd){
	if(empty($codigoProd) || empty($nombreProd) || empty($precioProd) || empty($descProd) || empty($imgProd)){
		return true;
	}
	else{
		return false;
	}
}

function validarExistenciaSegun($idProd,$nombreProd,$conexion){
	$queryExistencia = "SELECT *FROM productos WHERE idProducto = '$idProd' || nombre = '$nombreProd'";
	$resultado = mysqli_query($conexion,$queryExistencia);
	$filas = mysqli_num_rows($resultado);
	return $filas>0;

}

function insertarProducto($codigoProd,$nombreProd,$precioProd,$descProd,$imgProd,$conexion){
	$queryInsert = "INSERT INTO productos(idProducto,nombre,descripcion,precio,url)
	                VALUES('$codigoProd','$nombreProd','$descProd' ,'$precioProd','$imgProd')";
	mysqli_query($conexion, $queryInsert);

}

function recorrerElementos($elementos){
	for($i=0;$i<count($elementos);$i++){
		echo $elementos[$i];
	}
}


function obtenerValores(&$codigoProd,&$nombreProd,&$precioProd,&$descProd,&$imgProd){
	$codigoProd = $_POST['codigoProd'];
	$nombreProd = $_POST['nombreProd'];
	$precioProd = $_POST['precioProd'];
	$descProd = $_POST['descProd'];

	if($_FILES['imgProd']['name']==null){
		$imgProd=null;
	}else{
		$ruta = "Imagenes/";
		$imgProd = $_FILES['imgProd']['name'];
		move_uploaded_file($_FILES['imgProd']['tmp_name'], $ruta.$imgProd);
		$imgProd = $ruta.$imgProd;
	}
}

?>