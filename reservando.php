<!DOCTYPE html>
<html>
<head>
<title>Reservando</title>
<?php include "style.php"; ?>
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
 ?>

        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>




 <div class='container'>
<div class="col-sm-6" align:center >
  <h2 >Registro de hotel</h2> <br>
  <form class="form-horizontal" action="reservandoEXITO.php" method="POST">

  


<?php 
if(isset($_SESSION['fechallegada']))
{
  //$fechallegada = $_SESSION['fechallegada'];
  //$fechasalida = $_SESSION['fechasalida'];
  $fechallegada = date_format(new DateTime($_SESSION['fechallegada']),'Y-m-d');
  $fechasalida =  date_format(new DateTime($_SESSION['fechasalida']),'Y-m-d');
  $segundos=strtotime($fechasalida) - strtotime($fechallegada);
  $diferencia_dias=intval($segundos/60/60/24);  

  echo "
  <div class='form-group'>
      <label class='control-label col-sm-2' for='nombre'>Fecha Llegada:</label>
      <div class='col-sm-10'>
        <input type='text' class='form-control' id='fechallegada' name='fechallegada' value='$fechallegada' disabled>
      </div>
    </div>";

    echo "
  <div class='form-group'>
      <label class='control-label col-sm-2' for='nombre'>Fecha Salida:</label>
      <div class='col-sm-10'>
        <input type='text' class='form-control' id='fechasalida' name='fechasalida' value='$fechasalida' disabled>
      </div>
    </div>";

    $precio = $diferencia_dias*$_SESSION['precio'];
    
      echo "
  <div class='form-group'>
      <label class='control-label col-sm-2' for='nombre'>Precio por esos $diferencia_dias días:</label>
      <div class='col-sm-10'>
        <input type='text' class='form-control' id='precio' name='precio' value='$precio' disabled>
      </div>
    </div>";
}
else
{
  echo "<p><label for='testfield'>Fecha Llegada:</label><br/>";
  echo "<input type='text' value='' placeholder='YYYY-MM-dd HH:mm:ss' id='fechallegada' name='fechallegada' size='18'/></p>";
  echo "<p><label for='testfield'>Fecha Salida:</label><br/>";
  echo "<input type='text' value='' placeholder='YYYY-MM-dd HH:mm:ss'  id='fechasalida' name='fechasalida' size='18'/></p>";
}
?>


<br><br>


<!-- Vendor libraries -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>

<!-- If you're using Stripe for payments -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<!-- Credit card form -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><img class="pull-right" src="http://i76.imgup.net/accepted_c22e0.png">Datos de pago</h3>
                </div>
                <div class="panel-body">
                    <!-- <form role="form" id="payment-form"> -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">Número de tarjeta</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="numero" name="numero"  placeholder="Número de tarjeta de creditor correcto" required autofocus data-stripe="number" onkeypress="return num(event);" />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">Nombre</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="titular"  name="titular" placeholder="Juan Perez" required autofocus data-stripe="number" onkeypress="return letras(event);" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="expMonth">Fecha de expiración</label>
                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                        <input type="text" class="form-control"  id="vencimiento1" name="vencimiento1" placeholder="MM" required data-stripe="exp_month" onkeypress="return num(event);"/>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                        <input type="text" class="form-control"  id="vencimiento2" name="vencimiento2" placeholder="YY" required data-stripe="exp_year" onkeypress="return num(event);" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cvCode">CVV Código</label>
                                    <input type="password" class="form-control" id="codigo" name="codigo" placeholder="CV" required data-stripe="cvc" onkeypress="return num(event);" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg btn-block" type="submit" name="submit" value="insert">Iniciar Reservación</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>



<p><label for="testfield">idHotel</label>
<input type="text" id="codigo" name="codigo" size="1" value='<?php echo $_SESSION['idHotel']; ?>' disabled/></p>


</form>
</body>
</html>


<script>
function num(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function numYbarra(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8) || (keynum == 47))
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



