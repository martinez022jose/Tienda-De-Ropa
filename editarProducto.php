<?php

$errores = Array();

session_start();

if(empty($_SESSION['activo'])){
		header("location:user.php");
}

function obtenerRegistroUsuario($user,$conexion){
	$queryBusqueda = "SELECT *FROM usuario WHERE usuario = '$user'";
	$resultado = mysqli_query($conexion,$queryBusqueda);
	$registro = mysqli_fetch_array($resultado);
	return $registro;
}

function obtenerRegistro($idProducto,$conexion){
	$queryBusquedaRegistro = "SELECT *FROM productos WHERE idProducto = '$idProducto'";
	$consultaRegistro = mysqli_query($conexion,$queryBusquedaRegistro);
    $registro = mysqli_fetch_array($consultaRegistro);
    return $registro;
}

function actualizarDatos($idProducto,$nombreProd,$descProd,$precioProd,$url,$conexion){
	$queryUpdate = "UPDATE productos SET 
	                nombre='$nombreProd',descripcion='$descProd',precio='$precioProd', idProducto = '$idProducto' WHERE url='$url'";
     $actualizado = mysqli_query($conexion,$queryUpdate);
     return $actualizado;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Producto</title>
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
		    	<?php $user = $_SESSION['user'];
                  include("conexion.php");
                  $registro = obtenerRegistroUsuario($user,$conexion);
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
	<?php
	include ("conexion.php");
    $idProducto = $_GET['idProducto'];
    $producto = obtenerRegistro($idProducto,$conexion);
    

    if(!empty($_POST['submit'])){

	$idProducto =$_POST['nuevoIdProd'];
    $nombre = $_POST['nuevoNombreProd'];
    $descripcion = $_POST['nuevaDescProd'];
    $precio = $_POST['nuevoPrecioProd'];
    $url = $producto['url'];

   if(actualizarDatos($idProducto,$nombre,$descripcion,$precio,$url,$conexion))
   {
   	header("location:listaDeProductos.php");
   }
   else{
   	 array_push($errores,"<p class='error'> No se ha actualizado producto</p>");
   }
}
	?>
	<section>
		<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" class="form" enctype="multipart/form-data">

			
		    <h2>Actualizar Registro</h2>
			
			<div class="cajaInputs">
	
			<label>Codigo Producto: </label>
			<input class="contenido" name="nuevoIdProd" value="<?php echo $producto['idProducto'];?>">
						
			<label>Nombre Producto: </label>
			<input type="text" name="nuevoNombreProd" class="contenido" value="<?php echo $producto['nombre'];?>">
						
		
			<label>Descripcion Producto:</label>
			<textarea name="nuevaDescProd"class="textarea"><?php echo $producto['descripcion'];?></textarea>
						
		    <label>Precio Producto: </label>
			<input name="nuevoPrecioProd" type="text" class="contenido" value="<?php echo $producto['precio'];?>">
					
			<label>Imagen Producto:</label>
			<div class="cajaImagen">
				<img src="<?php echo $producto['url'];?>">
			</div>

            <div class="cajaConfirmacion">
			    <input id="buttonEditar" type="submit" name="submit" class="referencia" value="Editar">
		    </div>
		

		    </div>
				 
			</form>
		</section>

</body>
</html>