<?php

$errores = Array();

function obtenerRegistro($idProducto,$conexion){
	$queryBusquedaRegistro = "SELECT *FROM productos WHERE idProducto = '$idProducto'";
	$consultaRegistro = mysqli_query($conexion,$queryBusquedaRegistro);
    $registro = mysqli_fetch_array($consultaRegistro);
    return $registro;
}

function actualizarDatos($idProducto,$nombreProd,$descProd,$precioProd,$url,$conexion){
	$queryUpdate = "UPDATE productos SET 
	                nombre='$nombreProd',descripcion='$descProd',precio='$precioProd', idProducto = '$idProducto' WHERE url='$url'";
     $actualizado = mysqli_query($conexion,$queryUpdate);
     return $actualizado;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Producto</title>
	<link rel="stylesheet" type="text/css" href="estiloProductos.css">
</head>
<body>
	<header class="headerControl">
		<div class="title">
			<h1>Control De Productos</h1>
		</div>
		<div class="enlaces">
			<a href="controlProductos.php">Inicio</a>
		    <a href="listaDeProductos.php">Listado de productos</a>
		    <a href="registroProducto.php">Registro de producto</a>
		    <a href="eliminarProductoSegun.php">Eliminar segun</a>
				
		</div>
	</header>
	<?php
	include ("conexion.php");
    $idProducto = $_GET['idProducto'];
    $producto = obtenerRegistro($idProducto,$conexion);
    

    if(!empty($_POST['submit'])){

	$idProducto =$_POST['nuevoIdProd'];
    $nombre = $_POST['nuevoNombreProd'];
    $descripcion = $_POST['nuevaDescProd'];
    $precio = $_POST['nuevoPrecioProd'];
    $url = $producto['url'];

   if(actualizarDatos($idProducto,$nombre,$descripcion,$precio,$url,$conexion))
   {
   	header("location:listaDeProductos.php");
   }
   else{
   	 array_push($errores,"<p class='error'> No se ha actualizado producto</p>");
   }
}
	?>
	<section>
		<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" class="form" enctype="multipart/form-data">

			<div class="informacion">
				<h2>¿Estas seguro de eliminar este producto?</h2>
			</div>
	
			<label>Codigo Producto: </label>
			<input class="contenido" name="nuevoIdProd" value="<?php echo $producto['idProducto'];?>">
						
			<label>Nombre Producto: </label>
			<input type="text" name="nuevoNombreProd" class="contenido" value="<?php echo $producto['nombre'];?>">
						
		
			<label>Descripcion Producto:</label>
			<textarea name="nuevaDescProd"class="textarea"><?php echo $producto['descripcion'];?></textarea>
						
		    <label>Precio Producto: </label>
			<input name="nuevoPrecioProd" type="text" class="contenido" value="<?php echo $producto['precio'];?>">
					
			<label>Imagen Producto:</label>
			<div class="cajaImagen">
				<img src="<?php echo $producto['url'];?>">
			</div>

			<input id="buttonEliminar" type="submit" name="submit" class="referencia" value="Editar">
			<a  id="buttonCancelar" class="referencia" href="listaDeProductos.php">Cancelar</a>
				 
			</form>
		</section>

</body>
</html>