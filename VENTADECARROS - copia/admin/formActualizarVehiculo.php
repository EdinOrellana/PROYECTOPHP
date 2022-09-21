<?php 
include 'php/establecerComunicacion.php';
session_start();
if (!isset($_SESSION['usuarioSesion'])) {
  header('location: index.php');
  die();
}
$codiVehiculo=$_GET['codiVehiculo'];
$instruccion="SELECT * FROM vehiculos WHERE correlativo = '$codiVehiculo'";
$informacionCliente=mysqli_query($conexion,$instruccion);
$marca="";
$linea="";
$tipo="";
$transmision="";
$modelo="";
$km="";
$traccion="";
$combustible="";
$aniosMinimoCredito="";
$precio="";
$mensualidadAprox1=""; 
$cantidad_puertas="";
$color="";
while ($r=mysqli_fetch_assoc($informacionCliente)) {
$marca=$r['marca'];  
$linea=$r['linea'];
$tipo=$r['tipo'];
$transmision=$r['transmision'];
$modelo=$r['modelo']; 
$km=$r['km'];
$traccion=$r['traccion'];
$combustible=$r['combustible'];
$aniosMinimoCredito=$r['aniosMinimoCredito'];
$precio=$r['precio'];
$mensualidadAprox1=$r['mensualidadAprox']; echo $mensualidadAprox1;
$cantidad_puertas=$r['cantidad_puertas'];
$color=$r['color'];
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Galería vehiculos</title>
	<link rel="stylesheet" type="text/css" href="css/Modal1.css">
	<link rel="stylesheet" type="text/css" href="css/vehiculo.css">
</head>
<body>
<div class="encabezado" >
	 <img class="icoPrincipal" src="img/logo-intecap.png">
<h2 class="textoPrincipal">Galería de vehiculos</h2>

<a href="cerrarSesion.php" ><svg xmlns="http://www.w3.org/2000/svg" width="25" Color=blue fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg></a>
</div>
<?php
$Nombre = $_SESSION['usuarioSesion'];
echo "<h2>Bienvenido: ".$Nombre."</h2>"; 
?>

<br>
  
  <form  action="actualizarVehiculo.php" method="POST" enctype="multipart/form-data">  

     <input type="hidden" class="camposIngreso1" name="codiVehiculo"  value="<?php echo $codiVehiculo ?>"><br>

    <select  class="camposIngreso1" name="marca">
    <?php 
    $instruccion="SELECT * FROM marcas";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
      if ($r['id_marcar']==$marca){
        echo "<option value=".$r['id_marcar']." selected >".$r['marca']."</option>";
      }else{
      echo "<option value=".$r['id_marcar'].">".$r['marca']."</option>";   
      }
      
    }
     ?>
    </select><br>
    <input type="text" class="camposIngreso1" name="linea" placeholder="linea... " value="<?php echo $linea ?>"><br>

 <select  class="camposIngreso1" name="tipo">
    <?php 
    $instruccion="SELECT * FROM tipo_vehiculo";
    $resultado = mysqli_query($conexion,$instruccion);
    while ($r=mysqli_fetch_assoc($resultado)) {
      if ($r['id_tipo'] == $tipo){
        echo "<option value=".$r['id_tipo']." selected enable  >".$r['tipo']."</option>";
      }else{
         echo "<option value=".$r['id_tipo'].">".$r['tipo']."</option>";
      }
    }
     ?>
    </select><br>
 <select  class="camposIngreso1" name="transmision" >
    <?php 
    $instruccion="SELECT * FROM transmision";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
      if ($r['id_transmicion'] == $transmision){
        echo "<option value=".$r['id_transmicion']." selected enable >".$r['transmision']."</option>";
      }else{
    echo "<option value=".$r['id_transmicion'].">".$r['transmision']."</option>";
    }
  }
     ?>
    </select><br>
    <input type="text" class="camposIngreso1" name="modelo" placeholder="Modelo... "  value="<?php echo $modelo ?>"><br>
    <input type="text" class="camposIngreso1" name="km" placeholder="kilometros..."  value="<?php echo $km ?>"><br>
<select  class="camposIngreso1" name="traccion">
    <?php 
    $instruccion="SELECT * FROM traccion";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
      if ($r['id_traccion'] == $traccion){
        echo "<option value=".$r['id_traccion']." selected enable >".$r['traccion']."</option>";
      }else{
    echo "<option value=".$r['id_traccion'].">".$r['traccion']."</option>";
    }
  }
     ?>
    </select><br>
    <select  class="camposIngreso1" name="combustible">
    <?php 
    $instruccion="SELECT * FROM combustible";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
      if ($r['id_combustible'] == $combustible){
        echo "<option value=".$r['id_combustible']." selected enable >".$r['combustible']."</option>";
      }else{
    echo "<option value=".$r['id_combustible'].">".$r['combustible']."</option>";
    }
  }
     ?>
    </select><br>
<select  class="camposIngreso1" name="color">
    <?php 
    $instruccion="SELECT * FROM colores";
    $resultado = mysqli_query($conexion,$instruccion);
    
    while ($r=mysqli_fetch_assoc($resultado)) {
       if ($r['id_color'] == $color){
        echo "<option value=".$r['id_color']." selected enable >".$r['color']."</option>";
      }else{
    echo "<option value=".$r['id_color']." >".$r['color']." </option>";
    }
  }
     ?>
    </select><br>
    <input type="text" class="camposIngreso1" id="idprecio" name="precio" placeholder=" precio..." value="<?php echo $precio?>"><br>
    <input type="text" class="camposIngreso1" id="idaniosMinimoCredito" name="aniosMinimoCredito" placeholder="Años Minimo Credito..." value="<?php echo $aniosMinimoCredito?>"><br>

  <a  href="#"  onclick="interes()" > <svg xmlns="http://www.w3.org/2000/svg" class="icono1"  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
</svg></a> 
    <input type="text" class="camposIngreso1"  name="mensualidadAprox" id="res1" placeholder="Mensualidad recomendada..." value="<?php echo $mensualidadAprox1?>"><br>
    <input type="text" class="camposIngreso1" name="cantidad_puertas" min="2" max="4" step="2" placeholder="Cantidad de puertas..." value="<?php echo $cantidad_puertas?>"><br>
         
  <input type="file" name="archivo[]" class="imagen3" multiple=""  >
  <input type="submit" class="imagen4" id="regresar" onclick="regresar()"value="Actualizar">
    
  
  </form>


<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/calculos.js"></script>
</body>
</html>