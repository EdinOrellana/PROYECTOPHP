<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	include 'php/establecerComunicacion.php';
	$us_colaborador=$_POST['us_colaborador'];
	$us_contra=$_POST['us_contra'];
	$instruccion="SELECT * FROM usuarios WHERE Usuario = '$us_colaborador' ";
	$resultado=mysqli_query($conexion,$instruccion);
	//contar las filas de respuesta... deberia obligatoriamente tener 1 fila..
	//sin embargo en caso de que no exista el usuario devolveria 0, o tambien por error de programacion podria revolver mas 2 filas 
	$contador=mysqli_num_rows($resultado);
	//evaluando que la variable contador sea 1
	if ($contador==1) {
		//interpretacion la unica fila de respuseta
		$r=mysqli_fetch_array($resultado,MYSQLI_ASSOC);
		//Procediendo a evaluar la contraseña 
		if (password_verify($us_contra, $r['pass'])) {
			//Creado sesion 
			session_start();
			//Creando y cargando valores a espacio en el servidor
			$_SESSION['usuarioSesion']=$us_colaborador;		
			$_SESSION['nombreUsuario']=$r['Nombre'];
			header("location: principal.php");
		}
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Administración Vehiculos</title>
	<link rel="stylesheet" type="text/css" href="css/loginINTECAP.css">
</head>
<body>
<div class="auxLogin">
	<div class="lateralIzquierdo">
		<img src="img/logo-intecap.png">
	</div>
	<div class="lateralDerecho">
		
		
		<form style="width: 100%" action="" method="POST">
			<svg xmlns="http://www.w3.org/2000/svg" class="iconUser centrar h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
</svg>
				<h2 class="textoPrincipal">Credenciales</h2>
		
			<div class="auxCampos">
				
				<div class="auxDetampos"></div>
				<div class="auxDetampos">
					
			<input class="camposIngreso" type="text" name="us_colaborador" placeholder="Usuario...">

			<input class="camposIngreso" type="password" name="us_contra" placeholder="Contraseña...">
<a href="registrar.php">
			<svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" class="iconUser centrar h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
</svg>
			</a>

			</div>
			<div class="auxDetampos">
					<button class="camposIngreso btnIniciar"><svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
</svg>
</button>
			</div>
			</div>
			
		
		</form>

	</div>

</div>



</body>
</html>

 

