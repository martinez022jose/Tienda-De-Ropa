<?php

function validarEspaciosEnBlanco($nombre,$apellido,$mail,$mensaje){
    if(empty($nombre) || empty($apellido) || empty($mail) || empty($mensaje)){
        return true;
    }else{
        return false;
    }
}

function obtenerValores(&$nombre,&$apellido,&$email,&$mensaje){
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $email = $_POST['email'];
     $mensaje = $_POST['mensaje'];
}

function recorrerElementos($elementos){
    for($i=0;$i<count($elementos);$i++){
        echo $elementos[$i];
    }
}

//Declaramos variales para la obtencion de los datos
$errores = Array();
$mensajeExitoso = Array();
$nombre;
$apellido;
$email;
$mensaje;

//Realizamos validaciones

if(isset($_POST['submit'])){
    obtenerValores($nombre,$apellido,$email,$mensaje);

    if(validarEspaciosEnBlanco($nombre,$apellido,$email,$mensaje)){
        array_push($errores,"<p class='error'>Se debe compleatr todos los campos</p>");
    }else{
        if(strlen($nombre)>25){
        array_push($errores,"<p class='error'>Error debe ingresar un nombre menor a 25 caracteres</p>");}
        if(strlen($apellido)>25){
        array_push($errores,"<p class='error'>Error debe ingresar un apellido menor a 25 caracteres</p>");}
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($errores,"<p class='error'>Error debe ingresar un correo valido</p>");}

    }
    $destinatario = "martinez022jose@gmail.com";
    $asunto = "contacto desde nuestra web";
    $carta = "De:".$nombre;
    $carta.= "Correo".$email;
    $carta.= "Mensaje:".$mensaje;

   //Verificamos si hubo errores

   if(count($errores)>0){
        recorrerElementos($errores);

    }else{
        mail($destinatario,$asunto,$carta);
        array_push($mensajeExitoso,"<p class='mensajeExitoso'>Mensaje enviado exitosamente</p>");
    }
    recorrerElementos($mensajeExitoso);
}

    


?>