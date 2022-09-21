<?php 
include "php/establecerComunicacion.php";
$codiVehiculo=$_POST['codiVehiculo']; 
$marca=$_POST['marca']; 
$linea=$_POST['linea'];
$tipo=$_POST['tipo'];
$transmision=$_POST['transmision'];
$modelo=$_POST['modelo']; 
$km=$_POST['km'];
$traccion=$_POST['traccion'];
$combustible=$_POST['combustible'];
$aniosMinimoCredito=$_POST['aniosMinimoCredito'];
$precio=$_POST['precio'];
$mensualidadAprox=$_POST['mensualidadAprox'];
$cantidad_puertas=$_POST['cantidad_puertas'];
$color=$_POST['color']; 

	
foreach ($_FILES["archivo"]["tmp_name"] as $key => $tmp_name) {
	if ($_FILES["archivo"]["tmp_name"][$key]) {
		$nombreArchivo = $_FILES["archivo"]["name"][$key];	
		$ubicacion=$_FILES["archivo"]["tmp_name"][$key];
		$directorio="img/vehiculos/";	
		if (!file_exists($directorio)) {
		mkdir($directorio,0777) or die("No logramos crear carpeta");	
		}
		$dir = opendir($directorio);
		$ubicacionFinal=$directorio.$nombreArchivo;
		if (move_uploaded_file($ubicacion, $ubicacionFinal)) {
		
		$instruccion3 =" INSERT INTO fotos_autos (id_vehiculo, ubicacion) VALUES ('$codiVehiculo','$ubicacionFinal') ";
			mysqli_query($conexion,$instruccion3);
			//echo "Se ha trasladado correctamente";
		}else{
			//echo "Error, no se traslado.";
		}
		//cerrando carpeta
		closedir($dir);
	}
}

$instruccion1 ="UPDATE vehiculos SET marca = '$marca', linea = '$linea', tipo = '$tipo', transmision = '$transmision', km = '$km', combustible = '$combustible', precio = '$precio', aniosMinimoCredito = '$aniosMinimoCredito', mensualidadAprox = '$mensualidadAprox', cantidad_puertas = '$cantidad_puertas', modelo = '$modelo', color='$color',traccion='$traccion' WHERE correlativo = '$codiVehiculo' ;
			"; 
		mysqli_query($conexion,$instruccion1);	
header('location: principal.php');
 ?>