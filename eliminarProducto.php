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
		<div class="pantallaEliminar">
			<div class="informacion">
				<h2>¿Estas seguro de eliminar este producto?</h2>
				<?php
				include ("conexion.php");
				$idProducto = $_GET['idProducto'];
				$producto = obtenerRegistro($idProducto,$conexion);
				?>
				
				<div class="registro">
					<div class="item"><?php echo $producto['idProducto'];?></div>
				    <div class="item"><?php echo $producto['nombre'];?></div>
				    <div class="item"><?php echo $producto['descripcion'];?></div>
				    <div class="item"><?php echo $producto['precio'];?></div>
				    <div class="item"><?php echo $producto['url'];?></div>
					
				</div>

				<div class="confirmacionOperacion">
					<a href="#">Eliminar</a>
					<a href="#">Cancelar</a>
					
				</div>
			</div>
			
		</div>
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