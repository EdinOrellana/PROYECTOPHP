<?php 
include "php/establecerComunicacion.php";
//verificando las fotografias
//el ciclo foreach permitira replicar las acciones
//con todas las imagenes....
foreach ($_FILES["archivo"]["tmp_name"] as $key => $tmp_name) {

//validando que exista el nombre del archivo
	if ($_FILES["archivo"]["tmp_name"][$key]) {
		//recopilar el nombre del archivo...
		$nombreArchivo = $_FILES["archivo"]["name"][$key];	
		//recopilando ubicación temporal del archivo...
		$ubicacion=$_FILES["archivo"]["tmp_name"][$key];
		//directorio de salida en el servidor...
		$directorio="img/vehiculos/";	
		//validando que exista directorio...
		//negamos la expresión file_exists para evitarnos construir el ELSE
		if (!file_exists($directorio)) {
			//creando carpeta....
		mkdir($directorio,0777) or die("No logramos crear carpeta");	
		}

		$dir = opendir($directorio);//abriendo nuestra carpeta en el servidor....
		$ubicacionFinal=$directorio.$nombreArchivo;//estableciendo ubicación final img/ilustraciones/silla.jpg

		//mover imagen al servidor....
		if (move_uploaded_file($ubicacion, $ubicacionFinal)) {
			$instruccion ="INSERT INTO fotos_autos (Ubicacion) VALUES ('$ubicacionFinal')";
			mysqli_query($conexion,$instruccion);
			echo "Se ha trasladado correctamente";
		}else{
			echo "Error, no se traslado.";
		}

		//cerrando carpeta
		closedir($dir);



	}
}



 ?>