<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Registro de ciudades</title>
	  <?php include "style.php"; ?>
	 

	 <script type="text/javascript">

 var peticion;
 var seleccionadoo=null;
 var idUser=null;

function descargarArchivo(){
  peticion=iniciaPeticion();
  if(peticion)
      {
        peticion.onreadystatechange=muestraContenido;
        peticion.open("POST","conexionBDphp.php",true);
        peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var valores = "'" + document.getElementById("ciudad").value + "'";
        peticion.send('funcion=inserta&campos=nombre&tabla=ciudad&valores=' + valores + '&id=');      
      }
      alert("Ciudad registrada");
}

function iniciaPeticion(){
  if(window.XMLHttpRequest)
    return new XMLHttpRequest();
  else if(window.ActiveXObject)
    return new ActiveXObject("Microsoft.XMLHttp");
}

function seleccionado(id)
{
	alert(id);
}

function muestraContenido(){
    if(peticion.readyState == 4)
      if(peticion.status == 200)
      {
        document.getElementById("tab").innerHTML=peticion.responseText;
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
			  <br><strong><h2 ALIGN=center >Ciudades actuales</h2></strong><br>
			<form method="POST" >

			<div class="col-md-4"  >
			  <label for="ciudad">Registra una nueva ciudad:</label>
			  <input type="text" class="form-control" name='ciudad' id="ciudad"><br>
			  <button type="submit" onclick="descargarArchivo()" name="submit" value="registrarme" class="btn btn-primary">Registrar</button><br><br>
			</div>
			</form>

			  <table class='table'>
			    <thead>
			      <tr>
			        <th>ID</th>
			        <th>NOMBRE</th>
			      </tr>
			    </thead>
			    <tbody>

<?php

/***********************************************  INICIA  ******************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
***************************************************************************************************************/

$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");

	//------------------ SENTENCIA SQL -------------------\\ 
	$sql = "SELECT * from ciudad";
	//------------------ SENTENCIA SQL -------------------\\ 
	$res = mysqli_query($mysqli, $sql);
	$color = 'active';
	while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	 $nombre = $newArray['nombre'];
	 $id = $newArray['id_ciudad'];
	 if($color === 'active')
	 	$color = 'success';
	 else
	 	$color = 'active';
	 echo "
			      <tr class=$color>
			        <td>$id</td>
			        <td>$nombre</td>
			      </tr>
			    ";
	 }


/*if (isset($_POST['submit'])) {

	$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");
	//------------------ SENTENCIA SQL -------------------\\  
	$sql = "INSERT INTO ciudad (nombre) values ('".$_POST['ciudad']."')";
	//------------------ SENTENCIA SQL -------------------\\ 
	$res = mysqli_query($mysqli, $sql);
	if ($res)
	{
		echo '<script language="javascript">';
		echo 'alert("La ciudad se ha registrado correctamente")';
		echo '</script>';
		echo '<script> document.location.href="registroCiudad.php";</script>';
	}
	//header('Location: registroCiudad.php');
}
*************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/
?>

</tbody>
			  </table>
			</div>


</body>
</html>

<?php
ob_end_flush();
?>