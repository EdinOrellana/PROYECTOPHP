<?php 
define('SERVER', 'localhost');
define('USUARIOBD', 'root');
define('CONTRABD', '');
define('BASEDEDATOS', 'vehiculos');
try {
	$conexion=mysqli_connect(SERVER,USUARIOBD,CONTRABD,BASEDEDATOS);
} catch (Exception $e) {
	exit("No logramos conectarnos: ".$e->getMessage());
}
 ?>