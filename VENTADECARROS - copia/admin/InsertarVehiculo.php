<?php 
include "php/establecerComunicacion.php";
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
$instruccion1 ="INSERT INTO vehiculos (correlativo,marca, linea, tipo, transmision, modelo, km, traccion, combustible,color, aniosMinimoCredito, precio, mensualidadAprox ,cantidad_puertas) VALUES (NULL,'$marca', '$linea', '$tipo', '$transmision', '$modelo', '$km', '$traccion', '$combustible', '$color' ,'$aniosMinimoCredito', '$precio', '$mensualidadAprox', '$cantidad_puertas');";
mysqli_query($conexion,$instruccion1);	
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
		$instruccion2 ="SELECT correlativo from vehiculos order by correlativo desc limit 1; ";
		 $id_vehiculo=mysqli_query($conexion,$instruccion2);
		$r=mysqli_fetch_assoc($id_vehiculo);
		$instruccion3 =" INSERT INTO fotos_autos (id_vehiculo, ubicacion) VALUES (".$r['correlativo'].",'$ubicacionFinal') ";
			mysqli_query($conexion,$instruccion3);
			//echo "Se ha trasladado correctamente";
		}else{
			//echo "Error, no se traslado.";
		}
		//cerrando carpeta
		closedir($dir);
	}
}
header('location: principal.php');
 ?>