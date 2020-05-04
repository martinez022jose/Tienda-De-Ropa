<?php
function obtenerRegistro($idProducto,$conexion){
	$queryBusquedaRegistro = "SELECT *FROM productos WHERE idProducto = '$idProducto'";
	$consultaRegistro = mysqli_query($conexion,$queryBusquedaRegistro);
    $registro = mysqli_fetch_array($consultaRegistro);
    return $registro;
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

	<section>
		<div class="form">
			<div class="informacion">
				<h2>¿Estas seguro de eliminar este producto?</h2>
			
			<?php
				include ("conexion.php");
				$idProducto = $_GET['idProducto'];
				$producto = obtenerRegistro($idProducto,$conexion);
			?>

			<div class="registro">
					<div class="elemento">
						<div class="label">Codigo Producto: </div>
						<input type="text" class="contenido" value="<?php echo $producto['idProducto'];?>">
						
					</div>
					<div class="elemento">
						<div class="label">Nombre Producto: </div>
						<input type="text" class="contenido" value="<?php echo $producto['nombre'];?>">
						
					</div>
					<div class="elemento">
						<div class="label">Descripcion Producto:</div>
						<textarea class="textarea"><?php echo $producto['descripcion'];?></textarea>
						
					</div>
				    <div class="elemento">
						<div class="label">Precio Producto: </div>
						<input type="text" class="contenido" value="<?php echo $producto['precio'];?>">
						
					</div>

				    <div>Imagen Producto:</div>
				    <div class="cajaImagen">
				    	<img src="<?php echo $producto['url'];?>">
				    </div>
				  
					
				</div>

				<form class="confirmacionOperacion" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" >

					<input id="buttonEliminar" type="submit" name="submit" class="referencia" value="Editar">
					<a  id="buttonCancelar" class="referencia" href="listaDeProductos.php">Cancelar</a>
					
				</form>
			  </div>
			</div>
	</section>

</body>
</html>