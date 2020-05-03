<?php
include ("conexion.php");
$idProducto = $_GET['idProducto'];

$queryProducto = "SELECT *FROM productos WHERE idProducto = '$idProducto'";
$resultadoConsulta = mysqli_query($conexion,$queryProducto);
$producto = mysqli_fetch_array($resultadoConsulta);

?>