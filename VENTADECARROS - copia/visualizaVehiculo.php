<?php 	
include 'php/establecerComunicacion.php';
$codiVehiculo=$_GET['codVehiculo1'];
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
<h2 class="textoPrincipal">Predio Chapin</h2>
<div></div>
<div></div>
</div>
<?php 
$instruccion1 ="SELECT M.marca,V.linea,TV.tipo,TR.transmision,V.modelo,V.km,TRA.traccion,CO.combustible,C.color,V.precio 
FROM vehiculos V 
INNER JOIN marcas M ON V.marca=M.id_marcar
INNER JOIN colores C ON V.color=C.id_color
INNER JOIN tipo_vehiculo TV ON V.tipo=TV.id_tipo
INNER JOIN transmision  TR ON V.transmision= TR.id_transmicion
INNER JOIN traccion  TRA ON V.traccion= TRA.id_traccion
INNER JOIN combustible  CO ON V.combustible= CO.id_combustible
where correlativo = ".$codiVehiculo." ;
";
$resultado2=mysqli_query($conexion,$instruccion1);
$rLista=mysqli_fetch_assoc($resultado2);
echo "
<div class='divVista'>
<div>
    <input type='label' class='camposIngreso2' readonly='readonly' value='Marca'>
    <input type='label' class='camposIngreso3' readonly='readonly' value='".$rLista['marca']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='Linea'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['linea']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='Tipo'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['tipo']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='Transmision'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['transmision']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='Modelo'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['modelo']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='km'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['km']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='traccion'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['traccion']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='combustible'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['combustible']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='color'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['color']."' >
</div>
<div>
    <input type='label'  class='camposIngreso2' readonly='readonly' value='precio'>
    <input type='label'  class='camposIngreso3' readonly='readonly' value='".$rLista['precio']."' >
</div>
</div>
";
 ?>
<?php 
$instruccion1 ="SELECT ubicacion from fotos_autos WHERE id_vehiculo=".$codiVehiculo." ;";
$resultado=mysqli_query($conexion,$instruccion1);
$contador1=0;
while ($r=mysqli_fetch_assoc($resultado)) {
  echo "
<img class='imgCarc' id='b".$contador1."' src=admin/".$r['ubicacion'].">

  ";
$contador1=$contador1+1;
}
 ?>
  <div class="contenedorb">


<?php 
$instruccion1 ="SELECT ubicacion from fotos_autos WHERE id_vehiculo=".$codiVehiculo." ;";
$resultado=mysqli_query($conexion,$instruccion1);
$contador=0;
while ($r=mysqli_fetch_assoc($resultado)) {
  echo "

<img class='imgCarb' id='a".$contador."' onclick='Mostrar".$contador."()' src=admin/".$r['ubicacion'].">

  ";
$contador=$contador+1;
}
 ?>

</div>
<script type="text/javascript" src="js/imagen.js"></script>
</body>
</html>