<?php
$errores = Array();
$mensajeExitoso = Array();

function recorrerElementos($elementos){
	for($i=0;$i<count($elementos);$i++){
		echo $elementos[$i];
	}
}

function eliminarRegistro($idProducto,$conexion){
	$queryDelete = "DELETE FROM productos WHERE idProducto = '$idProducto'";
	$eliminar = mysqli_query($conexion,$queryDelete);
} 


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
	<title>Eliminar Producto</title>
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
		<div class="form">
			<div class="informacion">
				<h2>Eliminar Producto</h2>
				<?php
				include ("conexion.php");
				$idProducto = $_GET['idProducto'];
				$producto = obtenerRegistro($idProducto,$conexion);

				if(!empty($_POST['submit'])){
					if(!empty($idProducto)){
						eliminarRegistro($idProducto,$conexion);
					    header("location:listaDeProductos.php");

					}else{
                	array_push($errores,"<p class='error'>No se puedo eliminar</p>");

                }}

                recorrerElementos($errores);

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

				<form class="confirmacionOperacion" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" >

					<input id="buttonEliminar" type="submit" name="submit" value="Eliminar">
					
				</form>
			</div>
			
		</div>
	</section>

</body>
</html>
