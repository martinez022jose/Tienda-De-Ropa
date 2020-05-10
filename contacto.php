<!DOCTYPE html>
<html>
<head>
	<title>Venta Productos Ropa</title>
	<link rel="stylesheet" type="text/css" href="estiloProductos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://kit.fontawesome.com/59dceabbec.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<div class="contenedor">
			<div class="cajaLogo">
			   <div class="cajaImagen">
				 <p>LOGO</p>
			   </div>
		    </div>

		    <div class="cajaMenu">
			   <a href="index.php">Inicio</a>
			   <a href="index.php">Acerca De</a>
			   <a href="index.php">Productos</a>
			   <a href="contacto.php">Contacto</a>
			</div>
	    </div>
	</header>

	<div class="separador"></div>

	<section id="contacto">
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" 
				class="formulario">

				<h1>Formulario de contacto</h1>
				<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</h2>
				
                <?php
		          include("validacionEnvioMail.php");
		        ?>

                <div class="item">
					<label>Nombre/s:</label>
				    <input class="input" type="text" name="nombre"  placeholder="Ingrese Nombre" value="<?php if(isset($nombre)){ echo $nombre;} ?>">
				</div>
				<div class="item">
					<label>Apellido/s:</label>
				    <input class="input" type="text" name="apellido"  placeholder="Ingrese Apellido" value="<?php if(isset($apellido)){ echo $apellido;} ?>">
				</div>
				<div class="item">
					<label>Email:</label>
				    <input class="input" type="text" name="email"  placeholder="Ingrese Mail" value="<?php if(isset($email)){ echo $email;} ?>">
				</div>
				<div class="item">
					<label>Mensaje:</label>
					<textarea id="textarea" name="mensaje"  placeholder="Ingrese Texto" 
					value="<?php if(isset($mensaje)){ echo $mensaje;} ?>"></textarea>
				</div>
				<div class="item">
					<input class="enviar" id="buttonEnviar" type="submit" name="submit">
				</div>

				
				

			</form>
	</section>

	<div class="separador"></div>

	<footer>
        <div class="cajaInfo">
            <p>Venta Productos &copy </p>
            <div class="cajaIconos">
                <a class="fab fa-twitter-square" href="#"></a>
                <a class="fab fa-facebook-square" href="#"></a>
                <a class="fab fa-instagram-square" href="#"></a>
            </div>
        </div>
    </footer>

</body>
</html>