<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Registrando hotel</title>
<?php include "style.php"; ?>
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
<div class="col-sm-6" align:center >
  <h2 >Registro de habitación</h2> <br>
  <form class="form-horizontal" method="POST">

  <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre" name="nombre"  onkeypress="return letras(event);">
      </div>
    </div>

	 <div class="form-group">
	    <label class="control-label col-sm-2" for="precio">Precio:</label>
	    <div class="input-group"s>
	      <div class="input-group-addon">$</div>
	      <input type="text" class="form-control" id="precio" placeholder="dinero dinero dinero" name="precio" onkeypress="return num(event);">
	      <div class="input-group-addon">.00 MXN</div>
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="descuento">Descuento:</label>
	    <div class="input-group">
	      <input type="text" class="form-control" id="descuento" name="descuento" onkeypress="return num(event);">
	      <div class="input-group-addon">%</div>
	    </div>
	  </div>

	   <div class="form-group">
      <label class="control-label col-sm-2" for="descripcion">Descripción:</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="adultos">Adultos:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="adultos" placeholder="Ingresa cantidad de adultos" name="adultos" onkeypress="return num(event);">
      </div>
    </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="ninos">Niños:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ninos" placeholder="Ingresa cantidad de niños" name="ninos" onkeypress="return num(event);">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="web">Código de Habitación:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="web" placeholder="Ejemplo A12" name="web">
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="ubicacion">ID</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ubicacion" placeholder="Ingresa el sitio web" name="ubicacion" value='<?php echo $_SESSION['idHotel']; ?>' disabled>
      </div>
    </div>

		<div class="form-group">
		  <div class="col-sm-offset-2 col-sm-10">
		    <button type="submit" class="btn btn-info" name="submit" value="registrar">Registrar habitación</button>
		  </div>
		</div>

       
</form>

</body>
</html>

<?php

/***********************************************  INICIA  ******************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
***************************************************************************************************************/

if (isset($_POST['submit'])) {

	$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");
	//------------------ SENTENCIA SQL -------------------\\ 
	$sql = "INSERT INTO habitacion (nombre, precio, descuento, descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ('".$_POST['nombre']."','".$_POST['precio']."','".$_POST['descuento']."','".$_POST['descripcion']."','".$_POST['adultos']."','".$_POST['ninos']."','".$_POST['web']."',".$_SESSION['idHotel'].")";
	echo $sql;
	//------------------ SENTENCIA SQL -------------------\\ 
	$res = mysqli_query($mysqli, $sql);
	if ($res)
	{

	echo '<script language="javascript">';
	echo 'alert("Habitacion registrada")';
	echo '</script>';

	echo '<script language="javascript">';
	echo "window.location.href='habitaciones.php'";
	echo '</script>';

	}
}

/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/

?>