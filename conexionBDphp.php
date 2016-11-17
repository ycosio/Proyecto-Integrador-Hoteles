<?php
$funcion = trim($_POST["funcion"]);
$campos = trim($_POST["campos"]);
$tabla = trim($_POST["tabla"]);
$valores = trim($_POST["valores"]);
$id = trim($_POST["id"]);

$mysqli=null;
$resultado=null;

function conectar(){
	global $mysqli;
	$mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");
	if (mysqli_connect_errno($mysqli)) {
	    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
	}
}

function consulta($campos, $tabla){
	conectar();
	global $mysqli;
	$resultado = $mysqli->query("SELECT " . $campos . " FROM " . $tabla);

	while ($fila = $resultado->fetch_assoc()) {
	echo "<div id='" .  $fila['Cuenta'] . "'  onclick=seleccionado('" . $fila['Cuenta'] . "')>";
    echo " Cuenta: " . $fila['Cuenta'] . "</br>";
    echo " Nombre: " . $fila['Nombre'] . "</br>";
    echo " Escuela: " . $fila['Escuela'] . "</br></br>";
    echo "</div>";
	}
}

function inserta($valores, $tabla,$campos){
	conectar();
	global $mysqli;
	$mysqli->query("INSERT INTO " . $tabla . "(" .$campos. ") VALUES(" . $valores . ")");

}

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

function eliminaReservacion($valores, $tabla, $id){
	conectar();
	global $mysqli;
	$mysqli->query("DELETE FROM forma_de_pago WHERE id_fPago=(SELECT id_fPago FROM " . $tabla . " WHERE id_reservacion='" . $valores . "')");
	$mysqli->query("DELETE FROM " . $tabla . " WHERE id_reservacion='" . $valores . "'");
	$sql = "SELECT id_reservacion,fechallegada, hotel,nombre,fechaSalida from allreservaciones where id_cliente = ".$id." ORDER BY fechallegada desc;";
//------------------ SENTENCIA SQL -------------------\\ 
// echo $sql."<br>";

	$res = mysqli_query($mysqli, $sql);

	echo "<div id='VIAJES' class='tab-pane fade in active'><br>";
	while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		 $habitacion = $newArray['nombre'];
		 $nombre = $newArray['hotel'];
		 $id_reservacion = $newArray['id_reservacion'];
	   $fechallegada = fechaesp(date_format(new DateTime($newArray['fechaLlegada']),'Y-m-d'));
	   $fechaSalida = fechaesp(date_format(new DateTime($newArray['fechaSalida']), 'Y-m-d'));

		 echo "  <div class='list-group'>
		  <a href='#' class='list-group-item'>
		    <h4 class='list-group-item-heading'>$habitacion del hotel $nombre</h4>
		    <p class='list-group-item-text'>La reservación se hizo del $fechallegada al $fechaSalida</p>
	      <input type='submit' name='eliminar' value='Cancelar reservacion' onclick='eliminarSeleccionado($id_reservacion);' ></input>
		  </a>
		</div>";
	}
	 echo "</div>";

    echo "<div id='PAGOS' class='tab-pane fade'>";

    $sql = "SELECT r.fechaReservacion, f.numeroTarjeta FROM reservacion r INNER JOIN forma_de_pago f on r.id_fPago=f.id_fPago where r.id_cliente =".$id." order by r.fechaLlegada desc";
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
	 echo "</div>";
}

function eliminaHabitacion($valores, $tabla, $id){
	conectar();
	global $mysqli;
	$mysqli->query("DELETE FROM ". $tabla . " WHERE id_habitacion=" . $valores);

}

if($funcion=="consulta")
	consulta($campos,$tabla);
else if($funcion=="eliminaReservacion")
	eliminaReservacion($valores, $tabla, $id);
else if($funcion=="eliminaHabitacion")
	eliminaHabitacion($valores, $tabla, $id);
else
	inserta($valores,$tabla,$campos);


?>

