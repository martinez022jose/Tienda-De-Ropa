<!DOCTYPE html>
<html>
<head>
	<title>Venta Productos Ropa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="estiloProductos.css">
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
			   <a href="#inicio">Inicio</a>
			   <a href="#nosotros">Acerca De</a>
			   <a href="#productos">Productos</a>
			   <a href="contacto.php">Contacto</a>
			</div>
	    </div>
	</header>

	<div class="separador" id="inicio"></div>
	
    <section>
		<div class="cajaPortada">
				<img src="Imagenes/portada.jpg">
			    <div class="descripcion">
				   <h1>¿Buscas lo mejor del 2020?</h1>
				   <p>Seguinos</p>
				   <a href="#nosotros">Leer mas</a>
			    </div>
		</div>
	</section>

    <div class="separador" id="nosotros"></div>

	<section >
		<div class="introduccion">
			<h2>¿Por que deberias elegirno?</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</section>

	<div class="separador"></div>

	<section>
		<div class="cajaSlider">
			<ul>
				<li>
					<div class="cajaImagen">
						<img src="Imagenes/slider.jpg">
					</div>
				</li>
				<li>
					<div class="cajaImagen">
						<img src="Imagenes/slider2.jpg">
					</div>
				</li>
				<li>
					<div class="cajaImagen">
						<img src="Imagenes/slider3.jpg">
					</div>
				</li>
				<li>
					<div class="cajaImagen">
						<img src="Imagenes/slider4.jpg">
					</div>
				</li>
				<li>
					<div class="cajaImagen">
						<img src="Imagenes/slider5.jpg">
					</div>
				</li>
				<li>
					<div class="cajaImagen">
						<img src="Imagenes/slider6.jpg">
					</div>
				</li>
			</ul>
		</div>
	</section>
   
    <div class="separador"></div>
    <div class="separador" id="productos"></div>

    <section>
		<div class="cajaGaleria">
			<h3>Productos</h3>

			<div class="cajaItems">
			<?php
            include("conexion.php");
            $queryProductos = "SELECT *FROM productos";
            $consulta = mysqli_query($conexion,$queryProductos);
            while($fila = mysqli_fetch_array($consulta)){?>
               <div class="item">
                 <div class="cajaImagen">
                   <img class="img" src="<?php echo $fila['url'];?>">
                   <p class="precio"><?php echo $fila['precio'];?></p>
                 </div>
               <p><?php echo $fila['descripcion'];?></p>
               </div>
            <?php }?>
			</div>
	   </div>
	</section>

	<section>
		<div class="cajaPantallaUnica">
			<div class="cajaImg">
				<img class="imgUnica" src="">
				<div id="buttonClose" class="fas fa-times-circle"></div>
			</div>
			
			
		</div>
	</section>

	<div class="separador"></div>

    <section>
		<div class="cajaMapa">
			<h3>Donde estamos?</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0107497581866!2d-58.413186884813605!3d-34.60388968045945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca8c854bd13f%3A0xfc0cf5c054da4aa1!2sAbasto%20Shopping!5e0!3m2!1ses!2sar!4v1584813034492!5m2!1ses!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</section>


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
	<script type="text/javascript" src="funcionalidades.js"></script>


</body>
</html>