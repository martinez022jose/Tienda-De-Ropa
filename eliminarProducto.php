<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Producto</title>
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

	<div class="separador"></div>

	<section>
		<form class="form" method="POST">
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
						<div class="contenido"><?php echo $producto['idProducto'];?></div>
						
					</div>
					<div class="elemento">
						<div class="label">Nombre Producto: </div>
						<div class="contenido"><?php echo $producto['nombre'];?></div>
						
					</div>
					<div class="elemento">
						<div class="label">Descripcion Producto:</div>
						<div class="contenido"><?php echo $producto['descripcion'];?></div>
						
					</div>
				    <div class="elemento">
						<div class="label">Precio Producto: </div>
						<div class="contenido"><?php echo $producto['precio'];?></div>
						
					</div>

				    <div>Imagen Producto:</div>
				    <div class="cajaImagen">
				    	<img src="<?php echo $producto['url'];?>">
				    </div>
				  
					
				</div>

				<div class="confirmacionOperacion">
					<a class="buttonEliminar" href="validacionEliminarProducto.php">Eliminar</a>
					<a  class="buttonCancelar" href="listaDeProductos.php">Cancelar</a>
					
				</div>
			</div>
			
		</form>
	</section>

</body>
</html>

<?php
function obtenerRegistro($idProducto,$conexion){
	$queryBusquedaRegistro = "SELECT *FROM productos WHERE idProducto = '$idProducto'";
	$consultaRegistro = mysqli_query($conexion,$queryBusquedaRegistro);
    $registro = mysqli_fetch_array($consultaRegistro);
    return $registro;
}
?>