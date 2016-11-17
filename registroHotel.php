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
  <h2 >Registro de hotel</h2> <br>
  <form class="form-horizontal" method="POST">

    <div class="form-group"  class="ui-widget" >
      <label class="control-label col-sm-2" for="ciudad">Ciudad:</label>
        <div class="col-sm-10">
      <input type="text" class="form-control" id="ciudad" placeholder="Ingresa tu ciudad" name="ciudad" onkeypress="return letras(event);" autofocus>
      </div>
    </div>

  <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre" name="nombre"  onkeypress="return letras(event);">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="telefono" placeholder="Ingresa tu número telefónico" name="telefono" onkeypress="return num(event);">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="web">Sitio web:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="web" placeholder="Ingresa el sitio web" name="web">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="stars">Estrellas:</label>
      <div class="col-sm-10">
        <select id="stars" class="form-control" name='estrellas'>
          <option value="1"  selected="selected">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
      </select>
      </div>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="ubicacion">Calle donde se ubica:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ubicacion" placeholder="Ingresa el sitio web" name="ubicacion">
      </div>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="descripcion">Descripción:</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
      </div>
    </div>
  



<?php
include 'registroServicios.php';
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