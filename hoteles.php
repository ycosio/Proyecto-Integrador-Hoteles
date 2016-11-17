<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Bienvenidos a HotelitosChidos</title>
<?php 
 include "style.php";
?>

<script type="text/javascript">

 var peticion;
 var seleccionadoo=null;
 var idHotel=null;

function descargarArchivo(funcion){
  peticion=iniciaPeticion();
  if(peticion)
      {
        peticion.onreadystatechange=muestraContenido;
        peticion.open("POST","conexionBDphp.php",true);
        peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        peticion.send('funcion=' + funcion + '&campos=*&tabla=hotel&valores=' + seleccionadoo + '&id=' + idHotel);      
      }
}

function iniciaPeticion(){
  if(window.XMLHttpRequest)
    return new XMLHttpRequest();
  else if(window.ActiveXObject)
    return new ActiveXObject("Microsoft.XMLHttp");
}

function muestraContenido(){
    if(peticion.readyState == 4)
      if(peticion.status == 200)
      {
        document.getElementById("tab").innerHTML=peticion.responseText;
      }
}


 function eliminarSeleccionado(element,hotel)
 {
  if(confirm("¿Borrar Hotel?"))
    {
      seleccionadoo=element;
      idHotel=hotel;
      descargarArchivo('eliminaHotel');
      alert("Hotel " + idHotel + " borrado");
    }
}
 </script>
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
include 'menuADMIN.php';
?>

        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>

 <div class='container'>
	<br><strong><h2 ALIGN=center>Hoteles</h2></strong><br>

<?php

/***********************************************  INICIA  ******************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
***************************************************************************************************************/

	$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");

	//------------------ SENTENCIA SQL -------------------\\ 
	$sql = "SELECT * from hotel";
	//------------------ SENTENCIA SQL -------------------\\ 
	$res = mysqli_query($mysqli, $sql);

	while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	 $id = $newArray['id_hotel'];
	 $nombre = $newArray['nombre'];
	 $telefono = $newArray['telefono'];
	 $estrellas = $newArray['estrellas'];
	 $ubicacion = $newArray['direccion'];
	 $descripcion = $newArray['descripcion'];

	 echo "  
<form action='' method='POST'>
	 <div class='list-group'>
	  <a href='#' class='list-group-item'>
	    <h4 class='list-group-item-heading'><strong>$nombre</strong></h4><br>
	    <p class='list-group-item-text'>Ubicado en $ubicacion<br>Hotel $estrellas estrellas. <br>$descripcion<br>Tel. $telefono</p><br>
	    <input id='$id' type='hidden' name = 'submit' value= '$id'>
      <input id='$nombre' type='hidden' name = 'nombre' value= '$nombre'>
	    <button type='submit' name='$id' value='$id' class='btn btn-primary'>Habitaciones</button>
	  </a>
  </form>";

	
	 }


/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/


	 if (isset($_POST['submit'])) {
    echo '<br />The ' . $_POST['submit'] . ' submit button was pressed<br />';
    $_SESSION['idHotel'] = $_POST['submit'];
    $_SESSION['nombreHotel'] = $_POST['nombre'];
    header('Location: habitaciones.php');
}

?>

</div>




</body>
</html>
