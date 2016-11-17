<?php

session_start();

if($_SESSION["idUser"] != 1) //6 es admin
	{
		echo '<script language="javascript">';
		echo 'alert("BUEN INTENTO, NO DEBERIAS ESTAR AQUI")';
		echo '</script>';

		echo '<script language="javascript">';
		echo "window.location.href='login.php'";
		echo '</script>';
}
?>