<?php 
include 'php/establecerComunicacion.php';
$nombreColaborador=$_POST['nombreColaborador'];
$us_colaborador=$_POST['us_colaborador'];
$us_contra=$_POST['us_contra'];
//encriptando contraseña
$contra_encriptada=password_hash($us_contra, PASSWORD_DEFAULT);

$instruccion = "INSERT INTO usuarios (idUser, Nombre, usuario, pass) VALUES (NULL, '$nombreColaborador', '$us_colaborador', '$contra_encriptada')";

if(mysqli_query($conexion,$instruccion)){
	header('Location: modalExito.php');	
	
}else{
	header('Location: modalError.php');
}

 ?>