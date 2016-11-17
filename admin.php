<!DOCTYPE html>
<html>
<head>
<title>Perfil</title>
 <?php 
 include "style.php";
 ob_start();
 ?>
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


<div style="text-align: center;">
<h1>Hola.</h1><br><br>
<h2>¡Es hora de administrar! <br>Para empezar desplazate por el menú superior </h2><br><br><br><br>
<h3>Recuerda siempre cerrar la sesión.</h3>


    </div>
   </div>
</div>

</body>
</html>

<?php
ob_end_flush();
?>
