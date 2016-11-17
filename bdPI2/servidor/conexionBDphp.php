<?php
$funcion = trim($_POST["funcion"]);
$campos = trim($_POST["campos"]);
$tabla = trim($_POST["tabla"]);
$valores = trim($_POST["valores"]);

$mysqli=null;
$resultado=null;

function conectar(){
	global $mysqli;
	$mysqli = mysqli_connect("148.213.9.64", "root", "cactus", "CosioTerriquez");
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

function inserta($valores, $tabla){
	conectar();
	global $mysqli;
	$mysqli->query("INSERT INTO " . $tabla . " VALUES(" . $valores . ")");

	echo("Registrado");
}

function elimina($valores, $tabla){
	conectar();
	global $mysqli;
	$mysqli->query("DELETE FROM " . $tabla . " WHERE Cuenta='" . $valores . "'");

	echo("Eliminado");
}


if($funcion=="consulta")
	consulta($campos,$tabla);
else if($funcion=="elimina")
	elimina($valores, $tabla);
else
	inserta($valores,$tabla);


?>

