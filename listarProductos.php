<?php

listarProductos();

function estructuraProducto($url,$precio,$descripcion){
    
    $estructura = "<div class='item'>".
                     "<div class='cajaImagen'>".
                     "<img class='img' src='".$url."'>".
                     "<p class='precio'>".$precio."</p>".
                     "</div>".
                     "<p>".$descripcion."</p>".
                     "</div>";
    return $estructura;
}

function listarProductos(){
    include ("conexion.php");
    $queryProductos = "SELECT *FROM productos";
    $consulta = mysqli_query($conexion,$queryProductos);
    mysqli_close($conexion);
    while($fila = mysqli_fetch_array($consulta)){
        echo estructuraProducto($fila['url'],$fila['precio'],$fila['descripcion']);
    }
}



?>