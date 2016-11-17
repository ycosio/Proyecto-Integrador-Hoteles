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
        peticion.send('funcion=' + funcion + '&campos=*&tabla=habitacion&valores=' + seleccionadoo + '&id=' + idHotel);      
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
        document.getElementById("habitaciones").innerHTML=peticion.responseText;
      }
}

function mensaje()
{
  alert("Imposible de eliminar por que existen reservaciones para esta habitacion");
}

function mensaje2(id)
{
  window.location.href = 'actualizarHabitacion.php?Variable='+id; 
}

 function eliminarSeleccionado(element,hotel)
 {
  if(confirm("¿Borrar Habitacion?"))
    {
      seleccionadoo=element;
      idHotel=hotel;
      descargarArchivo('eliminaHabitacion');
      alert("Habitacion " + seleccionadoo + " borrada");
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

<?php
 echo "<br><strong><h2 ALIGN=center>Habitaciones del hotel ". $_SESSION['nombreHotel'] . "</h2></strong><br>";
/***********************************************  INICIA  ******************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
***************************************************************************************************************/
  
	$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");
  
	//------------------ SENTENCIA SQL -------------------\\ 
	$sql = "SELECT * from habitacion WHERE id_hotel=".$_SESSION['idHotel'];
	//------------------ SENTENCIA SQL -------------------\\ 
	$res = mysqli_query($mysqli, $sql);


  echo "<div id='habitaciones'>";


   $id = "-";
   $BANDERA=0;
   echo "<form action='registroHabitacion.php' method='POST'>
        <button type='submit' name='$id' value='$id' class='btn btn-primary'>Registrar habitación</button>
        </form>
        <br>";
	while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	 $id = $newArray['id_hotel'];
   $id_habitacion = $newArray['id_habitacion'];
	 $nombre = $newArray['nombre'];
	 $precio = $newArray['precio'];
	 $descuento = $newArray['descuento'];
	 $numeroHabitacion = $newArray['numeroHabitacion'];
	 $descripcion = $newArray['descripcion'];
   $sql2 = "SELECT * from reservacion WHERE id_habitacion=".$id_habitacion;
   $BANDERA=1;
  //------------------ SENTENCIA SQL -------------------\\ 
  $res2 = mysqli_query($mysqli, $sql2);

  echo "<form action='' method='POST'>
   <div class='list-group' onclick='mensaje2($id_habitacion)'>
    <a href='#' class='list-group-item'>
      <h4 class='list-group-item-heading'><strong>$nombre</strong>  &nbsp;&nbsp; &nbsp; <span class='glyphicon glyphicon-pencil'>Modificar</span> </h4> <br>
      <p class='list-group-item-text'>Precio $ $precio<br>$descripcion<br>Habitacion $numeroHabitacion </p> Descuento del $descuento % <br><br>";

   if($newArray2 = mysqli_fetch_array($res2, MYSQLI_ASSOC))
   {
    echo "  
      <button class='btn btn-danger' type='submit' name='eliminar' value='Borrar habitacion' onclick='mensaje()' >Borrar habitación</button>";
   }
   else
	 {
    echo "  
      <button class='btn btn-danger' type='submit' name='eliminar' value='Borrar habitacion' onclick='eliminarSeleccionado($id_habitacion,$id);' ><span class='glyphicon glyphicon-remove'></span> Borrar habitación</button>";
    }
  echo "</a>
    </form>
    
    </div>";

	 }

   echo "</div>";

   if($BANDERA==0)
    echo "<h4> No hay habitaciones registradas</h4>";




/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/

?>

</div>




</body>
</html>
