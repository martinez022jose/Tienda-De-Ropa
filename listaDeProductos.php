<!DOCTYPE html>
<html>
<head>
	<title>Lista de productos</title>
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
		<div class="listaProductos">
			<div class="encabezado">
				<div>idProducto</div>
				<div>nombreProducto</div>
				<div>precioProducto</div>
				<div>descripcionProducto</div>
				<div>imagen</div>
			</div>
			<?php 
			include ("conexion.php")
			function obtenerTabla(){

			} 
			while(?>
		</div>
	</section>

</body>
</html>