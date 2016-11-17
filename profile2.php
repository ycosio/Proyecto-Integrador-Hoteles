<!DOCTYPE html>
<html>
<head>
<title>Perfil</title>
 <?php 
 include "style.php";
 session_start(); ?>
</head>
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

if(!isset($_SESSION["idUser"]))
	include 'menuNOLOGIN.php';
else
	include "menu.php";
$idUser = $_SESSION["idUser"];
$nombreUser = $_SESSION["nombreUser"];
$telUser = $_SESSION["telUser"];
$correoUser = $_SESSION["correoUser"]; ?>


        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>


<div class="container">
  <h2>Movimientos y viajes</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#VIAJES"><span class="glyphicon glyphicon-plane"></span> Ultimos viajes</a></li>
    <li>               <a data-toggle="tab" href="#PAGOS"> <span class="glyphicon glyphicon-usd" ></span>Pagos efectuados</a></li>
  </ul>

  <div class="tab-content">
    <div id="VIAJES" class="tab-pane fade in active"><br>

  

<?php

function fechaesp($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];
    
    $dias = array("domingo","lunes","martes","mi&eacute;rcoles" ,"jueves","viernes","s&aacute;bado");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
 
    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    
    return $tomadia.", ".$day." de ".$meses[$month]." de ".$year;
}

/***********************************************  INICIA  ******************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
***************************************************************************************************************/
$mysqli = new mysqli("localhost", "root", "12345", "hoteles");
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {

//------------------ SENTENCIA SQL -------------------\\ 
$sql = "SELECT fechallegada, hotel,nombre,fechaSalida from allreservaciones where id_cliente = ".$idUser." ORDER BY fechallegada desc;";
//------------------ SENTENCIA SQL -------------------\\ 
// echo $sql."<br>";

$res = mysqli_query($mysqli, $sql);

	while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	 $habitacion = $newArray['nombre'];
	 $nombre = $newArray['hotel'];
	 
   $fechallegada = fechaesp(date_format(new DateTime($newArray['fechaLlegada']),'Y-m-d'));
   $fechaSalida = fechaesp(date_format(new DateTime($newArray['fechaSalida']), 'Y-m-d'));

	 echo "  <div class='list-group'>
	  <a href='#' class='list-group-item'>
	    <h4 class='list-group-item-heading'>$habitacion del hotel $nombre</h4>
	    <p class='list-group-item-text'>La reservación se hizo del $fechallegada al $fechaSalida</p>
	  </a>
	</div>";
	//echo $habitacion." del Hotel ".$nombre.", (".$fechallegada." - ".$fechaSalida.")<br/>";

	 }
}

?>

    </div>

    <div id="PAGOS" class="tab-pane fade">





<?php

$mysqli = new mysqli("localhost", "root", "12345", "hoteles");
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
//------------------ SENTENCIA SQL -------------------\\ 
$sql = "SELECT r.fechaReservacion, f.numeroTarjeta FROM reservacion r INNER JOIN forma_de_pago f on r.id_fPago=f.id_fPago where r.id_cliente =".$idUser." order by r.fechaLlegada desc";
//------------------ SENTENCIA SQL -------------------\\ 

$res = mysqli_query($mysqli, $sql);

	while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
   $fechallegada = fechaesp(date_format(new DateTime($newArray['fechaReservacion']),'Y-m-d'));
	 $numeroTarjeta = $newArray['numeroTarjeta'];

	  echo "  <div class='list-group'>
	  <a href='#' class='list-group-item'>
	    <h4 class='list-group-item-heading'>Pago realizado el $fechallegada</h4>
	    <p class='list-group-item-text'>Tarjeta $numeroTarjeta</p>
	  </a>
	</div>";

	 //echo "El ".$fechallegada." hiciste una reservación con la tarjeta ".$numeroTarjeta."<br/>";

	 }

}

/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/
?>

    </div>
</div>
</div>

</body>
</html>