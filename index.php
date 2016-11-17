<?php
ob_start();

?>



<!DOCTYPE HTML>
<html>
  <head>
    <title>Hoteles</title>
   

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
      session_start();
      if(!isset($_SESSION["idUser"]))
        include 'menuNOLOGIN.php';
      else
        include "menu.php";
        
        $_SESSION['fechallegada'] = date('Y-m-d', strtotime('-1 day'));
        $_SESSION['fechasalida'] = date('Y-m-d', strtotime('+2 day'));

      ?>


        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>
    <!----start-images-slider---->
    <div class="images-slider">
      <!-- start slider -->
        <div id="fwslider">
            <div class="slider_container">
                <div class="slide"> 
                    <!-- Slide image -->
                        <img src="web/images/slider-bg.jpg" alt=""/>
                    <!-- /Slide image -->
                    <!-- Texts container -->
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <!-- Text title -->
                            <h4 class="title">Viajar no es para ricos</h4>
                            <!-- /Text title -->
                            <!-- Text description -->
                            <p class="description">La vida es un libro, y aquellos que no viajan sólo leen una página.</p>
                            <!-- /Text description -->
                            <div class="slide-btns description">
                              <ul>
                                <li><a class="mapbtn" href="#reserva">Reserva ahora</a></li>
                                <li><a class="minfo" href="registroUsuario.php">Registrate</a></li>
                                <div class="clear"> </div>
                              </ul>
                            </div>
                        </div>
                    </div>
                     <!-- /Texts container -->
                </div>
                <!-- /Duplicate to create more slides -->
                <div class="slide">
                    <img src="web/images/slider-bg.jpg" alt=""/>
                    <div class="slide_content">
                         <div class="slide_content_wrap">
                            <!-- Text title -->
                            <h4 class="title">Viajar no es para ricos</h4>
                            <!-- /Text title -->
                            <!-- Text description -->
                            <p class="description">Viaja a la colonia más cercana con hotel y reserva.</p>
                            <!-- /Text description -->
                            <div class="slide-btns description">
                              <ul>
                                <li><a class="mapbtn" href="#reserva">Reserva ahora</a></li>
                                <li><a class="minfo" href="registroUsuario.php">Registrate</a></li>
                                <div class="clear"> </div>
                              </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/slide -->
            </div>
            <div class="timers"> </div>
            <div class="slidePrev"><span> </span></div>
            <div class="slideNext"><span> </span></div>
        </div>
        <!--/slider -->
    </div>
    <!----start-find-place---->
    <div class="find-place">
      <div class="wrap">
        <div class="p-h">
          <span>ENCUENTRA</span>
          <label>TU HOTEL</label>
        </div>
        <!---strat-date-piker---->
          <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
          <script>
          $(function() {
            $( "#datepicker" ).datepicker();
          });
          </script>

           <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
          <script>
          $(function() {
            $( "#datepicker2" ).datepicker();
          });
          </script>

        <!---/End-date-piker---->
        <div class="p-ww">
        <!--   <form> -->
           
            <!-- BUSCADOR -->
            <form action="busqueda.php" method="GET">
            <!-- <div class="ui-widget"> -->
              <h4> INGRESA LA CIUDAD A LA QUE DESEAS VIAJAR 
              <input type="text" id="ciudad" name='ciudad' autofocus > 
              <!-- onkeypress="return enter(event);" -->
            <!-- </div> -->
            </form>
            <!-- TERMINA BUSCADOR -->

            <!-- <span> Fecha inferior</span>
            <input class="date" id="datepicker" type="text" value="Select date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Select date';}">

            <span> Fecha superior</span>
            <input class="date" id="datepicker2" type="text" value="Select date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Select date';}"> -->

            <!-- <input type="submit" value="Buscar" /> -->

          <!-- </form> -->
        </div>
        <div class="clear"> </div>
      </div>
    </div>
    <!----//End-find-place---->
    <!----start-offers---->
    <div class="offers">
      <div class="offers-head">
        <h3><?php echo 'Ofertas espciales del '. date('Y-m-d', strtotime('-1 day')) . ' al ' . date('Y-m-d', strtotime('+2 day')) ;?></h3>
        <p>Los mejores descuentos en este momento!</p>
      </div>
      <!-- start content_slider -->
      <!-- FlexSlider -->
       <!-- jQuery -->
        <link rel="stylesheet" href="web/css/flexslider.css" type="text/css" media="screen" />
        <!-- FlexSlider -->
        <script defer src="web/js/jquery.flexslider.js"></script>
        <script type="text/javascript">
          $(function(){
            SyntaxHighlighter.all();
          });
          $(window).load(function(){
            $('.flexslider').flexslider({
              animation: "slide",
              animationLoop: true,
              itemWidth:250,
              itemMargin: 5,
              start: function(slider){
                $('body').removeClass('loading');
              }
            });
          });
        </script>
      <!-- Place somewhere in the <body> of your page -->
         <section id='reserva' class="slider">
           <form action='' method='POST'>;

            <div class="flexslider carousel">
              <ul class="slides">



<?php
if(isset($_SESSION["idUser"]))
{
  $idUser = $_SESSION["idUser"];
  $nombreUser = $_SESSION["nombreUser"];
  $telUser = $_SESSION["telUser"];
  $correoUser = $_SESSION["correoUser"];
}

/***********************************************  INICIA  ******************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
***************************************************************************************************************/
$mysqli = new mysqli("localhost", "root", "12345", "hoteles");
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {

//------------------ SENTENCIA SQL -------------------\\ 
$sql = "SELECT * from mejoresdescuentosTODO" ;
//------------------ SENTENCIA SQL -------------------\\

$res = mysqli_query($mysqli, $sql);
  
  while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
       $id = $newArray['id_hotel'];
       $hotel = $newArray['hotel'];
       $idhabitacion = $newArray['id_habitacion'];
       $habitacion = $newArray['nombre'];
       $telefono = $newArray['telefono'];
       $estrellas = $newArray['estrellas'];
       $ubicacion = $newArray['direccion'];
       $descripcion = $newArray['descripcion'];
       $precio = $newArray['precio'];
       $descuento = $newArray['descuento']*100;
       $descontado = $newArray['promocion'];


       //
       echo "<li>";
       echo "           <img src='web/images/$id.jpg' />";
       echo '           <div class="caption-info">
                        <div class="caption-info-head">
                        <div class="caption-info-head-left">';
       echo "<form action='' method='POST'>";
       echo "           <h4><a href='#'>$hotel</a></h4>
                        <span>Tel. $telefono <br>Calidad $estrellas estrellas </span> <br>
                        <span>$habitacion </span> <br>
                        <span>$ubicacion, $descripcion</span> <br>
                        <span>Precio por noche $<del>$precio</del>MXN, reserva desde $$descontado MXN por tiempo limitado.</span> <br> 
                                <input id=$id type='hidden' name = 'submit' value=$id>
                                <input type='hidden' name = 'idhabitacion' value=$idhabitacion>
                                <input type='hidden' name = 'precio' value=$descontado>
                        <button type='submit' name=$id value=$id>Reservar</button><br/><br/>
        </form>
                      </div>
                      <div class='caption-info-head-right'>
                        <span> </span>
                      </div>
                      <div class='clear'> </div>
                     </div>
                  </div>
                  </li>
            ";
          //
        
   }
   
}

echo " </form>";


/**************************************************************************************************************
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL   MYSQL
*********************************************  TERMINA  *******************************************************/
?>




              </ul>
            </div>
          </section>
              <!-- //End content_slider -->
    </div>
    <!----//End-offers---->


   
        <p class="copy-right">4CODE <a href="http://google.com/">best team ever</a></p>
        <a class="to-top" href="#header"><span> </span> </a>
      </div>
    </div>
    <!---//End-subfooter---->
    <!----//End-wrap---->



  </body>
</html>


<?php
if (isset($_POST['submit'])) {

    if(!isset($_SESSION["idUser"]))
      header('Location: login.php');
    else{
    echo '<br />The ' . $_POST['submit'] . ' submit button was pressed<br />';
    $_SESSION['idHotel'] = $_POST['submit'];
    $_SESSION['idhabitacion'] = $_POST['idhabitacion'];
    $_SESSION['precio'] = $_POST['precio'];
    header('Location: reservando.php');
  }
}


?>

<?php
ob_end_flush();
?>
