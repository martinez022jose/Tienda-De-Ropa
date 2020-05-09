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
	<title>Control Productos</title>
	<link rel="stylesheet" type="text/css" href="estiloProductos.css">
	<script src="https://kit.fontawesome.com/59dceabbec.js" crossorigin="anonymous"></script>
</head>
<body>
	<header class="headerControl">
		 <?php $user = $_SESSION['user'];
                  include("conexion.php");
                  $registro = obtenerRegistro($user,$conexion);
                  mysqli_close($conexion);
            ?>
		<div class="portada">
		    <div class="cajaLogo">
		    	<div class="center">
		    		<h2 class="logo">LOGO</h2>
			        <h1>Control De Productos</h1>
		    	</div>
			   
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

	<div class="separador"></div>

	<section>
		<div class="cajaBienvenida">
			<div class="bienvenida">
				<h2></h2>
			</div>
		
		</div>
	</section>

	<section>
		<div class="cajaDeConfiguracion">
			<div class="listaConf">

				<h1>Personalizar</h1>

				<a href="cambioPerfil.php" class="confPerfil">Configuracion De Perfil</a>
				
				<a href="cambioPass.php" class="confPass">Configuracion De Contraseña</a>
			</div>

			<div class="cajaFormulario">
			    <form class="formulario" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">

				     <h1>Cambiar Perfil</h1>

				     <?php include("validarCambioPerfil.php")?>

				    <div class="cajaImagenPerfil">
					     	<img src="<?php echo $registro['perfil']?>">
					</div>

				    <div class="item">
					     <label>Usuario nuevo:</label>
					     <input class="inputUser" type="text" name="nuevoUser" placeholder="Ingrese Usuario">
					
				     </div>

				     <div class="item">
					     <label>Foto nueva:</label>
					     <input  type="file" class="inputFile" name="imgPerfil" placeholder="Ingrese Foto Perfil">
					</div>
				
				     <div class="item">
					     <label>Debe confirmar completando: </label>
					     <input class="inputPass" type="text" name="passVerificacion" placeholder="Ingrese Contraseña">
					
				     </div>

				     <div class="item">
					     <input id="cambiarPass" type="submit" name="cambiarPerfil" value="Cambiar">
					
				     </div>

				    

				     
			     </form>
			</div>
		</div>
	</section>

</body>
</html>