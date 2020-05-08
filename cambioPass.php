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
		<div class="cajaDeConfiguracion">
			<div class="listaConf">

				<h1>Personalizar</h1>

				<a href="#" class="confPerfil">Configuracion De Perfil</a>
				
				<a href="cambioPass.php" class="confPass">Configuracion De Contraseña</a>
			</div>

			

			<div class="cajaFormulario">
			    <form class="formulario" method="POST">
				     <h1>Cambiar Contraseña</h1>

				     <?php include("validacionCambioPass.php")?>

				     <div class="item">
					     <label>Contraseña nueva:</label>
					     <input class="inputPass" type="text" name="nuevaPass" placeholder="Ingrese Contraseña">
					
				     </div>
				
				     <div class="item">
					     <label>Confirmacion:</label>
					     <input class="inputPass" type="text" name="confPass" placeholder="Ingrese Confirmacion">
					
				     </div>

				     <div class="item">
					     <input id="cambiarPass" type="submit" name="cambiarPass" value="Cambiar">
					
				     </div>
			     </form>
			</div>
		</div>
	</section>

</body>
</html>