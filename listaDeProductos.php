<!DOCTYPE html>
<html>
<head>
	<title>Lista de productos</title>
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
			    	 <div class="cajaImagen">
			    	 	<img src="Imagenes/perfil.png">
			    	 </div>
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

	<div class="separadorControl"></div>

	<section>
		<div class="listaDeProductos">
			<div class="title">
				<h2>Lista de productos</h2>
			</div>

			<div class="encabezadoPrincipal">
				<div class="encabezado">idProducto</div>
				<div class="encabezado">nombreProducto</div>
				<div class="encabezado">descripcionProducto</div>
				<div class="encabezado">precioProducto</div>
				<div class="encabezado">imagen</div>
			</div>
			
			<?php 
			
			include ("conexion.php");
			$queryProductos = "SELECT *FROM productos";
			$consulta = mysqli_query($conexion,$queryProductos);
			
			while($filas = mysqli_fetch_array($consulta)){?>
				<div class="item">
					<div class="dato"><?php echo $filas['idProducto']?></div>
				    <div class="dato"><?php echo $filas['nombre']?></div>
				    <div class="dato"><?php echo $filas['descripcion']?></div>
				    <div class="dato"><?php echo $filas['precio']?></div>
				    <div class="cajaImagen">
				    	<img src="<?php echo $filas['url']?>">
				    </div>
				    <div class="funcionalidad">
				    	<a class="refEliminar" href="eliminarProducto.php?idProducto=<?php echo $filas['idProducto']?>">Eliminar</a>
				    	<a class="refEditar" href="editarProducto.php?idProducto=<?php echo $filas['idProducto']?>">Editar</a>
				    </div>
				    
				</div>
			<?php } ?>
		</div>
	</section>
	

</body>
</html>