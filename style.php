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
  
<!--   <link rel="stylesheet" href="/search/jquery-ui.css">
  <script src="/search/jquery-1.10.2.js"></script>
  <script src="/search/jquery-ui.js"></script>
 -->
  <script>
  
  $(function() {
    $( "#ciudad" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>




    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>