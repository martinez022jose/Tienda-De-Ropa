
<?php

session_start();

if(empty($_SESSION['activo'])){
		header("location:user.php");
} 
function obtenerRegistro($user,$conexion){
	$queryBusqueda = "SELECT *FROM usuario WHERE usuario = '$user'";
	$resultado = mysqli_query($conexion,$queryBusqueda);
	$registro = mysqli_fetch_array($resultado);
	return $registro;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>registroProducto</title>
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

		    	<?php
		    	include("conexion.php");
		    	$registro = obtenerRegistro($_SESSION['user'],$conexion);
		    	mysqli_close($conexion);
		    	?>
			   
			    <div class="rigth">
			    	 <div class="cajaImagen">
			    	 	<img src="<?php echo $registro['perfil'];?>">
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
		<form class="form" id="formProd" method="POST" name="formProd">
			<div class="informacion">
				<h1>Registrar Producto</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
			    </p>
			</div>

			<div class="resFormularioProd"></div>
			

			<div class="cajaInputs">
				<label>Codigo de producto: </label><input type="text" id="codigoProd" name="codigoProd" placeholder="Ingrese Codigo">
				<label>Nombre de producto: </label><input type="text" id="nombreProd" name="nombreProd" placeholder="Ingrese Nombre">
				<label>Precio de producto: </label><input type="text" id="precioProd" name="precioProd" placeholder="Ingrese Precio">
				<label>Descripcion: </label><textarea id="descProd" name="descProd" placeholder="Ingrese Descripcion"></textarea>
			    <label>Imagen: </label><input type="file" class="imgProd" id="imgProd" name="imgProd"  placeholder="Ingrese Imagen">
			    <input type="button" value="Registrar" id="button">
			</div>
			
		</form>
	</section>

	<script type="text/javascript" src="funcionalidades.js"></script>


</body>
</html>