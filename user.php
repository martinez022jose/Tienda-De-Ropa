<?php

session_start();

if(!empty($_SESSION['activo'])){
		header("location:controlProductos.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="estiloProductos.css">
</head>
<body>
	<section>
			
		
		<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" class="formUsuario" enctype="multipart/form-data">
			<h2>Sign in</h2>
			<?php include("validacionUser.php");?>

		    <div class="cajaInputs">
		    <label>Usuario: </label>
			<input type="text" name="nombreDeUsuario" placeholder="Ingrese Usuario">
						
			<label>Contraseña: </label>
			<input type="text" name="contraseñaDeUsuario" placeholder="Ingrese Contraseña">

			<input id="buttonRegistro" type="submit" name="submit" values="Ingresar">
		    </div>
		    
			</form>
		
		</section>

</body>
</html>