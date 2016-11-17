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

   <script>
  function num(e)
  {
     var keynum = window.event ? window.event.keyCode : e.which;
     if ((keynum == 8))
          return true;
      return /\d/.test(String.fromCharCode(keynum));
  }
  </script>

     <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
          <script>
          $(function() {
            $( "#datepicker" ).datepicker();
          });
          </script>

       <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
      <script>
      $(function() {
        $( "#datepicker2" ).datepicker();
      });
      </script>

  <!-- SCRIPTS -->

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
session_start();
if(!isset($_SESSION["idUser"]))
	include 'menuNOLOGIN.php';
else
	include "menu.php";
if(isset($_SESSION['fechallegada']))
{
  unset($_SESSION['fechallegada']);
  unset($_SESSION['fechasalida']);
}
?>

        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>



<div class='container'>
<div class="col-sm-6" align:center >
<h2 >Completa tu búsqueda</h2> <br>
 

 <div class="form-group"  class="ui-widget" >
 <form action="busqueda.php" method="GET">
      <label class="control-label col-sm-2" for="ciudad">Ciudad:</label>
        <div class="col-sm-10">
      <input type="text" class="form-control" id="ciudad" placeholder="Ingresa tu ciudad" name="ciudad" onkeypress="return letras(event);" autofocus value='<?php echo  $_GET['ciudad']?>'>
      </div>
      </form>
    </div>
    </div>
    </div>

<div class='container'>
<div class="col-sm-6" align:center >
<form action="filtros.php" method="POST">


     <div class="form-group">
      <label class="control-label col-sm-2" for="fechainf">Fecha inferior:</label>
      <div class="col-sm-10">
        <input type="text" id="datepicker" value="Select date" class="date" class="form-control" id="fechainf" placeholder="Fecha inferior" name="fechallegada" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Select date';}">
      </div>
    </div><br><br><br>

      <div class="form-group">
      <label class="control-label col-sm-2" for="fechasup">Fecha superior:</label>
      <div class="col-sm-10">
        <input class="date" id="datepicker2" type="text" value="Select date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Select date';}" class="form-control" id="fechasup" placeholder="Fecha superior" name="fechasalida">
      </div>
    </div><br><br><br>


      <!-- </div> -->
  
   <div class="form-group">
      <label class="control-label col-sm-2" for="precio">Precio Mínimo:</label>
      <div class="input-group">
        <div class="input-group-addon">$</div>
        <input type="text" class="form-control" id="precio" placeholder="0" name="nummax" onkeypress="return num(event);">
        <div class="input-group-addon">.00 MXN</div>
      </div>
      </div>

  <div class="form-group">
      <label class="control-label col-sm-2" for="precio">Precio Máximo:</label>
      <div class="input-group">
        <div class="input-group-addon">$</div>
        <input type="text" class="form-control" id="precio" placeholder="0" name="nummin" onkeypress="return num(event);">
        <div class="input-group-addon">.00 MXN</div>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="servicios">Filtrado por servicios:</label>
      <div class="col-sm-10" class="checkbox" >

    <input name="check_list[]" type="checkbox" value='1'/>Wifi <br>
    <input name="check_list[]" type="checkbox" value='2'/>Estacionamiento <br>
    <input name="check_list[]" type="checkbox" value='3'/>Gimnasio <br>
    <input name="check_list[]" type="checkbox" value='4'/>Mascotas permitidas <br>
    <input name="check_list[]" type="checkbox" value='5'/>Instalaciones Deportivas <br>
    <input name="check_list[]" type="checkbox" value='6'/>Alberca <br>
    <input name="check_list[]" type="checkbox" value='7'/>Spa <br>
    <input name="check_list[]" type="checkbox" value='8'/>Bar Hotel <br>
    <input name="check_list[]" type="checkbox" value='9'/>Bar Playa <br>
    <input name="check_list[]" type="checkbox" value='10'/>Doctor <br>
    <input name="check_list[]" type="checkbox" value='11'/>Restaurante <br>
  
            
      </div>
    </div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-info" name="buscar" value="buscar">Voy a tener suerte</button>
  </div>
</div>
</form>

</div></div></div></div>



<div class='container'>
<div class="col-sm-6" align:center >
  <!-- <h2>Nuestras opciones para tu ciudad</h2> <br> -->


<?php
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

$_SESSION["ciudad"]=$_GET['ciudad'];

//------------------ SENTENCIA SQL -------------------\\ 
$sqlCIUDAD = "SELECT id_ciudad from ciudad where nombre='".$_GET['ciudad']."'";
//------------------ SENTENCIA SQL -------------------\\ 

$resCIUDAD = mysqli_query($mysqli, $sqlCIUDAD);
while ($newArray = mysqli_fetch_array($resCIUDAD, MYSQLI_ASSOC)) {
	 $idciudad = $newArray['id_ciudad'];
	}

//------------------ SENTENCIA SQL -------------------\\ 
$sql = "SELECT * from vistafiltros where id_ciudad=".$idciudad. " GROUP BY id_habitacion;";
//------------------ SENTENCIA SQL -------------------\\ 

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

			 // echo "<form action='' method='POST'>";
			 // echo "Hotel ".$hotel." <br>Habitacion " . $habitacion . " <br>Tel.".$telefono.".<br/>";
			 // echo $estrellas." estrellas. <br>Ubicado en calle ".$ubicacion.".<br/>".$descripcion.".<br>";
			 // echo "Obten un descuento de ".$descuento." y reserva de <del>$".$precio."MXN </del> a solo $".$descontado."MXN <br/>";
	   //   echo "<input id='".$id."' type='hidden' name = 'submit' value= '".$id."'>";
    //    echo "<input id='".$idhabitacion."' type='hidden' name = 'idhabitacion' value= '".$idhabitacion."'>";
	   //   echo "<button type='submit' name='".$id."' value='".$id."'>Reservar</button><br/><br/>";
    //    echo "</form>";
	 }

}

if (isset($_POST['submit'])) {

    if(!isset($_SESSION["idUser"]))
      header('Location: login.php');
    else{
    echo '<br />The ' . $_POST['submit'] . ' submit button was pressed<br />';
    $_SESSION['idHotel'] = $_POST['submit'];
    $_SESSION['idhabitacion'] = $_POST['idhabitacion'];
    header('Location: reservando.php');
  }
}
/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/
?>

<!-- </div></div> -->

</body>
</html>

<?php
ob_end_flush();
?>
