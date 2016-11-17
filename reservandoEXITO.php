<?php
ob_start();

session_start();
// if(!isset($_SESSION["idUser"]))
// 	include 'menuNOLOGIN.php';
// else
// 	include "menu.php";

$idUser = $_SESSION["idUser"];
$nombreUser = $_SESSION["nombreUser"];
$telUser = $_SESSION["telUser"];
$correoUser = $_SESSION["correoUser"];
$idHotel = $_SESSION['idHotel'];
$id_habitacion = $_SESSION['idhabitacion'];

/***********************************************  INICIA  ******************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
***************************************************************************************************************/

$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");

if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {


$fecha = date("Y-m-d H:i:s");

if(isset($_SESSION['fechallegada']))
{
  $fechallegada = $_SESSION['fechallegada'];
  $fechasalida = $_SESSION['fechasalida'];
  
  unset($_SESSION['fechallegada']);
  unset($_SESSION['fechasalida']);

}
else
{
	$fechallegada = mysqli_real_escape_string($mysqli, $_POST['fechallegada']);
	$fechasalida = mysqli_real_escape_string($mysqli, $_POST['fechasalida']);
}


$numero = mysqli_real_escape_string($mysqli, $_POST['numero']);
$titular = mysqli_real_escape_string($mysqli, $_POST['titular']);
$vencimiento = mysqli_real_escape_string($mysqli, $_POST['vencimiento1']."/".$_POST['vencimiento2']);
$codigo = mysqli_real_escape_string($mysqli, $_POST['codigo']);

$cliente =  $idUser;
$hotel =  $idHotel;

//------------------ SENTENCIA SQL -------------------\\ 
$sql = "call reservandobien('".$numero."','".$titular."','".$vencimiento."','".$codigo."','".$fecha."','".$fechallegada."','".$fechasalida."','".$cliente."','".$hotel."','".$id_habitacion."')";
$res = mysqli_query($mysqli, $sql);
//------------------ SENTENCIA SQL -------------------\\ 

/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/
?>
	
<!DOCTYPE html>
<html>
<head>
<title>Reservación</title>
<?php include "style.php"; ?>
</head>
<body>

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
 
      <div class="header">
        <div class="wrap">
        <!--- start-logo---->
        <div class="logo">
          <a href="index.html"><img src="web/images/logo.png" title="HotelesBonitos" /></a>
        </div>
        <!--- //End-logo---->

        <?php

if(!isset($_SESSION["idUser"]))
  include 'menuNOLOGIN.php';
else
  include "menu.php";
 ?>

        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>


<?php if ($res === TRUE) { ?>

<form style="text-align: center;" action="index.php" method="">
<h4>La reservación fue existosa</h4>
<p><label for="testfield">Hotel con ID <?php echo $hotel;?> habitación <?php echo $id_habitacion?></label><br/>
<p><label for="testfield">A nombre de <?php echo  $titular; ?>, para el dia <?php echo $fechallegada; ?></label><br/><br>
<button name="submit" value="insert">Regresar al inicio</button>
</form>

<?php 
  unset($_SESSION['idhabitacion']);
  unset($_SESSION['idHotel']);
} else {
printf("Problemillas bro: %s\n", mysqli_error($mysqli));
}
mysqli_close($mysqli);
}
?>



</body>
</html>