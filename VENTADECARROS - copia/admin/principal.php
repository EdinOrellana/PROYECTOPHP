<?php 	
include 'php/establecerComunicacion.php';

session_start();
if (!isset($_SESSION['usuarioSesion'])) {
	header('location: index.php');
	die();
}
//EL MENU DESPEGABLE <svg class="btnMenu" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  //<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Galería vehiculos</title>
	<link rel="stylesheet" type="text/css" href="css/Modal1.css">
	<link rel="stylesheet" type="text/css" href="css/vehiculo.css">
		<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.btnAccion{
width: 30px;
color: blue;

}
</style>
</head>
<body>
<div class="encabezado" >
	 <img class="icoPrincipal" src="img/logo-intecap.png">
<h2 class="textoPrincipal">Galería de vehiculos</h2>

<div onclick="mostrarimgen1()">
	<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="25" Color=blue fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></a>
</div>



<div id="modal1" class="fondo">
	

	<form  action="InsertarVehiculo.php" method="POST" enctype="multipart/form-data">  
    <select  class="camposIngreso" name="marca">
    <?php 
    $instruccion="SELECT * FROM marcas";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
    echo "<option value=".$r['id_marcar'].">".$r['marca']."</option>";
    }
     ?>
    </select><br>
    <input type="text" class="camposIngreso" name="linea" placeholder="linea..."><br>

 <select  class="camposIngreso" name="tipo">
    <?php 
    $instruccion="SELECT * FROM tipo_vehiculo";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
    echo "<option value=".$r['id_tipo'].">".$r['tipo']."</option>";
    }
     ?>
    </select><br>
 <select  class="camposIngreso" name="transmision">
    <?php 
    $instruccion="SELECT * FROM transmision";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
    echo "<option value=".$r['id_transmicion'].">".$r['transmision']."</option>";
    }
     ?>
    </select><br>
    <input type="text" class="camposIngreso" name="modelo" placeholder="Modelo..."><br>
    <input type="text" class="camposIngreso" name="km" placeholder="kilometros..."><br>
<select  class="camposIngreso" name="traccion">
    <?php 
    $instruccion="SELECT * FROM traccion";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
    echo "<option value=".$r['id_traccion'].">".$r['traccion']."</option>";
    }
     ?>
    </select><br>
    <select  class="camposIngreso" name="combustible">
    <?php 
    $instruccion="SELECT * FROM combustible";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
    echo "<option value=".$r['id_combustible'].">".$r['combustible']."</option>";
    }
     ?>
    </select><br>
<select  class="camposIngreso" name="color">
    <?php 
    $instruccion="SELECT * FROM colores";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
    echo "<option value=".$r['id_color'].">".$r['color']."</option>";
    }
     ?>
    </select><br>
    <input type="text" class="camposIngreso" id="idprecio" name="precio" placeholder=" precio..."><br>
    <input type="text" class="camposIngreso" id="idaniosMinimoCredito" name="aniosMinimoCredito" placeholder="Años Minimo Credito..."><br>

  <a  href="#"  onclick="interes()" > <svg xmlns="http://www.w3.org/2000/svg" class="icono"  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
</svg></a>  
    <input type="text" class="camposIngreso"  name="mensualidadAprox" id="res1" placeholder="Mensualidad recomendada..."><br>
    <input type="text" class="camposIngreso" name="cantidad_puertas" min="2" max="4" step="2" placeholder="Cantidad de puertas..."><br>
         
  <input type="file" name="archivo[]" class="imagen2Modal" multiple=""  >
  <input type="submit" class="imagen" id="regresar" onclick="regresar()"value="Añadir">
    
  
  </form>

</div>


<a href="cerrarSesion.php" ><svg xmlns="http://www.w3.org/2000/svg" width="25" Color=blue fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg></a>
</div>

<?php
$Nombre = $_SESSION['usuarioSesion'];
echo "<h2>Bienvenido: ".$Nombre."</h2>"; 
?>

<table>
  <tr>
    <th>Marca</th>
    <th>linea</th>
    <th>Modelo</th>
     <th>Color</th>
    <th>Eliminar</th>
    <th>Editar</th>
  </tr>
<?php 
$instruccion ="
SELECT V.correlativo,M.marca,V.linea,V.modelo,C.color FROM vehiculos V
INNER JOIN marcas M ON V.marca=M.id_marcar
INNER JOIN colores C ON V.color=C.id_color";
$resultado=mysqli_query($conexion,$instruccion);
while ($r=mysqli_fetch_assoc($resultado)) {
	echo "<tr>
  <td>".$r['marca']."</td>
  <td>".$r['linea']."</td>
  <td>".$r['modelo']."</td>
  <td>".$r['color']."</td>
	<td><a href='eliminaVehiculo.php?codVehiculo=".$r['correlativo']."'> <svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 btnAccion' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
  <path stroke-linecap='round' stroke-linejoin='round' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'/>
</svg></a></td>
<td> <div>
<a href='formActualizarVehiculo.php?codiVehiculo=".$r['correlativo']."'><svg xmlns='http://www.w3.org/2000/svg'  class='h-6 w-6 btnAccion '  fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
  <path stroke-linecap='round' stroke-linejoin='round' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z' />
</svg></a></div>
</td>
</tr>";
}
 ?>
</table>
<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/calculos.js"></script>
</body>
</html>