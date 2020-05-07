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
		<div class="portada">
		    <div class="cajaLogo">
		    	<div class="center">
		    		<h2 class="logo">LOGO</h2>
			        <h1>Control De Productos</h1>
		    	</div>
			   
			    <div class="rigth">
			    	 <div id="iconoUsuario" class="far fa-user"></div>
			         <a id="cerrarSesion" href="salida.php" class="fas fa-power-off"></a>
			    </div>
			   
		    </div>

		    <div class="enlaces">
			    <a href="controlProductos.php">Inicio</a>
		        <a href="listaDeProductos.php">Listado de productos</a>
		        <a href="registroProducto.php">Registro de producto</a>
		        <a href="eliminarProductoSegun.php">Eliminar segun</a>
				
		    </div>
	    </div>
	</header>

	<div class="separador"></div>
	
	<section>
		<div class="cajaBienvenida">
			<div class="bienvenida">
				<h2>Bienvenido al control de productos</h2>
			</div>
		
		</div>
	</section>

</body>
</html>