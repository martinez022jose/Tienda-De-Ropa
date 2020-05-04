
<!DOCTYPE html>
<html>
<head>
	<title>registroProducto</title>
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
		<form class="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" 
			method="POST" enctype="multipart/form-data">
			<div class="informacion">
				<h1>Registrar Producto</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
			    </p>
			</div>

			<?php include("validacionRegistroProducto.php");?>

			<div class="cajaInputs">
				<label>Codigo de producto: </label><input type="text" name="codigoProd" placeholder="Ingrese Codigo">
				<label>Nombre de producto: </label><input type="text" name="nombreProd" placeholder="Ingrese Nombre">
				<label>Precio de producto: </label><input type="text" name="precioProd" placeholder="Ingrese Precio">
				<label>Descripcion: </label><textarea name="descProd" placeholder="Ingrese Descripcion"></textarea>
			    <label>Imagen: </label><input type="file" name="imgProd" placeholder="Ingrese Imagen">
			    <input type="submit" name="submit" value="Registrar" id="button">
			</div>
			
		</form>
	</section>


</body>
</html>