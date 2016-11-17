
<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Registrarte</title>
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
				include 'menuNOLOGIN.php';
		?>

        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>


 <div class='container'>
<div class="col-sm-6" align:center >
  <h2 >Registro de usuario</h2> <br>
  <form class="form-horizontal" method="POST">
  <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre" name="nombre"  onkeypress="return letras(event);">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="Telefono">Teléfono:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Telefono" placeholder="Ingresa tu número telefónico" name="telefono" onkeypress="return num(event);">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Correo Electrónico:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Ingresa tu email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name='submit'>Registrar</button>
      </div>
    </div>
  </form>
</div>
</div>


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
	$sql = "INSERT INTO cliente (nombre,telefono,email,password) values ('".$_POST['nombre']."','".$_POST['telefono']."','".$_POST['email']."','".$_POST['password']."')";
	//------------------ SENTENCIA SQL -------------------\\ 

	$res = mysqli_query($mysqli, $sql);
	
	///OBTENER EL ID
	$sql2 = "SELECT count(*) FROM cliente";
	$res2 = mysqli_query($mysqli, $sql2);
	$cantidad = mysqli_num_rows($res2);
	if ($res2)
	{
	while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
			$idselect = $newArray['count(*)'];
		}
	}

	if ($res)
	{
	session_start();
    session_unset();
	$_SESSION["idUser"] = $idselect;
	$_SESSION["nombreUser"] = $_POST['nombre'];
	$_SESSION["telUser"] = $_POST['telefono'];
	$_SESSION["correoUser"] = $_POST['email'];

	echo '<script language="javascript">';
	echo 'alert("FELICIDADES HAS QUEDADO REGISTRADO. SERÁS REDIRECCIONADO A LA PAGINA PRINCIPAL")';
	echo '</script>';

	echo '<script language="javascript">';
	echo "window.location.href='index.php'";
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

<script>
function num(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function letras(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8) || (keynum == 32))
        return true;
    return /[a-zA-Z]/.test(String.fromCharCode(keynum));
}

</script>

<?php
ob_end_flush();
?>