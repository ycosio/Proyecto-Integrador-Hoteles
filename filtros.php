<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Bienvenidos a HotelitosChidos</title>
<?php 
 include "style.php";

$nummax = $_POST['nummax'];
$nummin = $_POST['nummin'];


?>
</head>

<!-- SCRIPTS -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  
  $(function() {
    $( "#ciudad" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
  <!-- SCRIPTS -->
<body>


    <!----start-wrap---->
      <!----start-top-header----->
      <div class="top-header" id="header">
        <div class="wrap">
        <div class="top-header-right">
          <ul>
            <li><a class="face" href="#"><span> </span></a></li>
            <li><a class="twit" href="#"><span> </span></a></li>
            <li><a class="thum" href="#"><span> </span></a></li>
            <li><a class="pin" href="#"><span> </span></a></li>
            <div class="clear"> </div>
          </ul>
        </div>
        <div class="clear"> </div>
      </div>
      </div>
      <!----//End-top-header----->
      <!---start-header---->
      <div class="header">
        <div class="wrap">
        <!--- start-logo---->
        <div class="logo">
          <a href="index.html"><img src="web/images/logo.png" title="HotelesBonitos" /></a>
        </div>
        <!--- //End-logo---->

<?php
session_start();
if(!isset($_SESSION["idUser"]))
	include 'menuNOLOGIN.php';
else
	include "menu.php";
?>

        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>



<div class='container'>
<div class="col-sm-6" align:center >
  <h2>Nueva búsqueda</h2> <br>
 

<!-- BUSCADOR -->
<form action="busqueda.php" method="GET">
<div class="ui-widget">
  <label for="ciudad">Ciudad: </label>
  <input type="text" id="ciudad" name='ciudad' autofocus > 
  <!-- onkeypress="return enter(event);" -->
</div>
</form>
</div></div>

<!--   BUSCADOR  -->

<div class='container'>
<div class="col-sm-6" align:center >
  <h2>Resultados de la búsqueda</h2> <br>


<?php

	$wifi = "No";
	$estacionamiento="No";
	$gimnasio="No";
	$mascotas="No";
	$deportivas="No";
	$alberca="No";
	$spa="No";
	$barhotel="No";
	$barplaya="No";
	$doctor="No";
	$restaurante="No";


	if(!empty($_POST['check_list'])) {
	    foreach($_POST['check_list'] as $check) {
	    
		    switch ($check) {
		    case 1:
		        $wifi = "Si";
		        break;
		    case 2:
		        $estacionamiento = "Si";
		        break;
		    case 3:
		        $gimnasio = "Si";
		        break;
		    case 4:
		        $mascotas = "Si";
		        break;
		    case 5:
		        $deportivas = "Si";
		        break;
		    case 6:
		        $alberca = "Si";
		        break;    
		    case 7:
		        $spa = "Si";
		        break;
		    case 8:
		        $barhotel = "Si";
		        break;
		    case 9:
		        $barplaya = "Si";
		        break;
		    case 10:
		        $doctor = "Si";
		        break;
		    case 11:
		        $restaurante = "Si";
		        break;
			}

	    }
	}

/***********************************************  INICIA  ******************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
***************************************************************************************************************/

	$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");

	$fechallegada = $_POST['fechallegada'];	
	$fechasalida = $_POST['fechasalida'];

	//------------------ SENTENCIA SQL -------------------\\ 
	$sql = "call filtros('".$fechallegada."','".$fechasalida."','". $_SESSION['ciudad'] . "','".$wifi."','".$estacionamiento."', '".$gimnasio."', '".$mascotas."', '".$deportivas."','".$alberca."', '".$spa."','".$barhotel."','".$barplaya."', '".$doctor."', '".$restaurante."',".$nummax.",".$nummin.");";
	//------------------ SENTENCIA SQL -------------------\\ 
	$res = mysqli_query($mysqli, $sql);
	if(mysqli_fetch_array($res, MYSQLI_ASSOC)!=null)
	{
		$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");
		$res = mysqli_query($mysqli, $sql);
		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			 $id = $newArray['id_hotel'];
			 $hotel = $newArray['hotel'];
			 $idhabitacion = $newArray['id_habitacion'];
			 $habitacion = $newArray['nombre'];
			 $telefono = $newArray['telefono'];
			 $estrellas = $newArray['estrellas'];
			 $ubicacion = $newArray['direccion'];
			 $descripcion = $newArray['descripcion'];
			 $precio = $newArray['precio'];
			 $descuento = $newArray['descuento']*100;
			 $descontado = $newArray['promocion'];


			 echo " <form action='' method='POST'>
						 <div class='list-group'>
						  <a href='#' class='list-group-item'>
						    <h4 class='list-group-item-heading'><strong>Hotel $hotel</strong></h4><br>
						    <p class='list-group-item-text'>Habitación $habitacion disponible.<br>Hotel $estrellas estrellas. <br>$descripcion<br>Ubicado en $ubicacion <br>Promocion $descuento%, reserva ahora de <del>$ $precio MXN </del> a solo $ $descontado MXN</p><br>

								<input id='$id' type='hidden' name = 'submit' value= '$id'>
					 			<input type='hidden' name = 'habitacion' value= '$idhabitacion'>
					 			<input type='hidden' name = 'fechallegada' value= '$fechallegada'>
								<input type='hidden' name = 'fechasalida' value= '$fechasalida'>
								<input type='hidden' name = 'precio' value= '$descontado'>
						    
						    	<button type='submit' name='$id' value='$id' class='btn btn-primary'>Reservar</button>
								  </a>
							 </form>  
						</div>";

			 // echo "<form action='' method='POST'>";
			 // echo "Hotel ".$hotel." <br>Habitacion " . $habitacion . " <br>Tel.".$telefono.".<br/>";
			 // echo $estrellas." estrellas. <br>Ubicado en calle ".$ubicacion.".<br/>".$descripcion.".<br>";
			 // echo "Obten un descuento de ".$descuento." y reserva de <del>$".$precio."MXN </del> a solo $".$descontado."MXN <br/>";
			 // echo "<input id='".$id."' type='hidden' name = 'submit' value= '".$id."'>";
			 // echo "<input type='hidden' name = 'habitacion' value= '".$idhabitacion."'>";
			 // echo "<input type='hidden' name = 'fechallegada' value= '".$fechallegada."'>";
			 // echo "<input type='hidden' name = 'fechasalida' value= '".$fechasalida."'>";
			 // echo "<button type='submit' name='".$id."' value='".$id."'>Reservar</button><br/><br/>";

			 // echo "</form>";
		 }
	}
	else
		echo "<h4>Ningun resultado</h4>";

/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/

    if (isset($_POST['submit'])) {

    if(!isset($_SESSION["idUser"]))
      header('Location: login.php');
    else{
    echo '<br />The ' . $_POST['submit'] . ' submit button was pressed<br />';
    $_SESSION['idHotel'] = $_POST['submit'];
    $_SESSION['idhabitacion'] = $_POST['habitacion'];
    $_SESSION['fechallegada'] = $_POST['fechallegada'];
    $_SESSION['fechasalida'] = $_POST['fechasalida'];
    $_SESSION['precio'] = $_POST['precio'];
    header('Location: reservando.php');
	}
}


?>



</body>
</html>


<?php
ob_end_flush();
?>