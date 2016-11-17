	<div class="form-group">
      <label class="control-label col-sm-2" for="servicios">Servicios:</label>
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
    <button type="submit" class="btn btn-info" name="submit" value="registrarme">Registrar</button>
  </div>
</div>

</form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {

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
		//------------------ SENTENCIA SQL -------------------\\ 
	$sql = "SELECT id_ciudad from ciudad where nombre = '".$_POST['ciudad']."' ;";
	//------------------ SENTENCIA SQL -------------------\\ 
	$res = mysqli_query($mysqli, $sql);
		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		 $idciudad = $newArray['id_ciudad'];
		 }
	 $sql = "call serviciosyhotel('".$_POST['nombre']."','".$_POST['telefono']."','".$_POST['web']."','".$_POST['estrellas']."','".$_POST['ubicacion']."','".$_POST['descripcion']."','".$idciudad."','".$wifi."','".$estacionamiento."', '".$gimnasio."', '".$mascotas."', '".$deportivas."','".$alberca."', '".$spa."','".$barhotel."','".$barplaya."', '".$doctor."', '".$restaurante."')";
  	
	$res = mysqli_query($mysqli, $sql);
	if ($res)
	{
		echo '<script language="javascript">';
		echo 'alert("HOTEL '.$_POST['nombre'].' Y SUS SERVICIOS HAN QUEDADO REGISTRADOS.")';
		echo '</script>';

		echo '<script> document.location.href="hoteles.php";</script>';
	}
	echo $sql;
}

/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/
?>