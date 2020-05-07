<?php
session_start();

if(empty($_SESSION['activo'])){
		header("location:user.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Control Productos</title>
	<link rel="stylesheet" type="text/css" href="estiloProductos.css">
	<script src="https://kit.fontawesome.com/59dceabbec.js" crossorigin="anonymous"></script>
</head>
<body>
	<header class="headerControl">
		<div class="title">
			<h2>LOGO</h2>
			<h1>Control De Productos</h1>
			<div id="iconoUsuario" class="far fa-user"></div>
			<a href="salida.php" class="fas fa-power-off"></a>

		</div>
		<div class="enlaces">
			<a href="controlProductos.php">Inicio</a>
		    <a href="listaDeProductos.php">Listado de productos</a>
		    <a href="registroProducto.php">Registro de producto</a>
		    <a href="eliminarProductoSegun.php">Eliminar segun</a>
				
		</div>
	</header>
	
	<section>
		<div class="bienvenida">
			<h2>Bienvenido al control de productos</h2>
		</div>
	</section>

</body>
</html>