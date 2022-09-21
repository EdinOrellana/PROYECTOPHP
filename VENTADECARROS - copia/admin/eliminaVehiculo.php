<?php 
include 'php/establecerComunicacion.php';

$codigoVehiculo=$_GET['codVehiculo'];
$instruccion="DELETE FROM fotos_autos WHERE id_vehiculo = '$codigoVehiculo' ";
mysqli_query($conexion,$instruccion);
$instruccion="DELETE FROM vehiculos WHERE correlativo = '$codigoVehiculo' ";
mysqli_query($conexion,$instruccion);
header('location: principal.php');
 ?>