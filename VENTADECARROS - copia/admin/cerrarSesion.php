<?php 

session_start();
//eliminar o destruimos la sesion
session_destroy();
//	
header('location: index.php');


 ?>