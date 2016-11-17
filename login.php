<?php
ob_start();
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>Hoteles</title>
    <link href="web/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    </script>
    <script src="web/js/jquery.min.js"></script>
    <!---script---->
    <link rel="stylesheet" href="web/css/jquery.bxslider.css" type="text/css" />
    <script src="web/js/jquery.bxslider.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.bxslider').bxSlider({
             auto: true,
             autoControls: true,
             minSlides: 4,
             maxSlides: 4,
             slideWidth:450,
             slideMargin: 10
          });
        });
      </script>
    <!---//script---->
    <!---smoth-scrlling---->
      <script type="text/javascript">
        $(document).ready(function(){
                  $('a[href^="#"]').on('click',function (e) {
                      e.preventDefault();
                      var target = this.hash,
                      $target = $(target);
                      $('html, body').stop().animate({
                          'scrollTop': $target.offset().top
                      }, 1000, 'swing', function () {
                          window.location.hash = target;
                      });
                  });
                });
        </script>
    <!---//smoth-scrlling---->
    <!----start-top-nav-script---->
    <script type="text/javascript" src="web/js/flexy-menu.js"></script>
    <script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
    <!----//End-top-nav-script---->
    <!---webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!---webfonts---->
    <!--start slider -->
    <link rel="stylesheet" href="web/css/fwslider.css" media="all">
    <script src="web/js/jquery-ui.min.js"></script>
    <script src="web/js/css3-mediaqueries.js"></script>
    <script src="web/js/fwslider.js"></script>
    <!--end slider -->
    <!---calender-style---->
    <link rel="stylesheet" href="web/css/jquery-ui.css" />
    <!---//calender-style---->
    <!-- SCRIPTS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



  </head>
  <body>
    <!----start-wrap---->
      <!--start-top-header-->
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
      <!---start-header--
      <div class="header">
        <div class="wrap">
        <!--- start-logo---->
        <div class="logo">
          <a href="index.html"><img src="web/images/logo.png" title="HotelesBonitos" /></a>
        </div>
        <!--- //End-logo---->



           <?php
          session_start();
          session_unset();
          if(!isset($_SESSION["idUser"]))
            include 'menuNOLOGIN.php';
          else
            include "menu.php"; ?>

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
                        <div class="slide_content_wrap" style="margin: 8.5% auto 0;">
                            <!-- Text title -->
                            <h4 class="title">Inicia sesión para obtener más beneficios</h4>
                            <!-- /Text title -->
                            <!-- Text description -->
                            <p class="description">Si no tienes cuenta registrate dando click <a style="color:white; font:bold font-style:underline" href="registroUsuario.php">AQUÍ</a></p>
                            
                            <!-- /Text description -->
                            <div class="slide-btns description">
                              <ul>

    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
    <link rel="stylesheet" href="web/css/style.css">

        <div class="wrapper" style="width:350px; margin: 0 auto;">
          <form class="form-signin" name="login" action="" method="post">
      <h2 class="form-signin-heading">Correo</h2>
     <input type="text" class="form-control" name="correo" placeholder="Numero de cuenta" required="" autofocus="" /><br>
      <h2 class="form-signin-heading">Contraseña</h2>
     <input type="password" class="form-control" name="password" placeholder="Contraseña" required=""/><br>
     <button class="btn btn-lg btn-primary btn-block" name ="submit" type="submit">Iniciar Sesión</button> 
    </form>
  </div>



                                <div class="clear"> </div>
                              </ul>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/slider -->
    </div>
      </div>
    </div>
  </body>
</html>



<?php
if (isset($_POST['submit'])) {

  $mysqli = mysqli_connect("localhost", "root", "12345", "hoteles");
  
  //------------------ SENTENCIA SQL -------------------\\ 
  $sql = "SELECT * from  cliente where email = '".$_POST['correo']."' AND password = '".$_POST['password']."'";
  //------------------ SENTENCIA SQL -------------------\\ 
  
  $res = mysqli_query($mysqli, $sql);
  $cantidad = mysqli_num_rows($res);
  if ($res)
  {
  while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

    if($cantidad == 0)
    {
      header('Location: registroUsuario.php');
      session_destroy();
      break;
    } 
    else{

      $correo = $newArray['email'];
      $password = $newArray['password'];
      $id = $newArray['id_cliente'];
      $telefono = $newArray['telefono'];
      $nombre = $newArray['nombre'];

      $_SESSION["idUser"] = $id;
      $_SESSION["nombreUser"] = $nombre;
      $_SESSION["telUser"] = $telefono;
      $_SESSION["correoUser"] = $correo;
      }
      

      if($correo=="admin@ucol.mx")
        header('Location: admin.php');
      else
        header('Location: index.php');
    }
    
  }

}
?>


<?php
ob_end_flush();
?>