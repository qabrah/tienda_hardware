
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Naranti Hardware</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets --> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
      <!-- body -->
      <body class="main-layout special-page">
         <!-- loader  -->
         <div class="loader_bg">
            <div class="loader"><img src="images/loading.gif" alt="#" /></div>
         </div>
         <!-- end loader -->
         <!-- header -->
         <header>
            <!-- header inner -->
            <div class="header">

              <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.php"><img src="images/Logos/naranti.jpg" style="height: 10vh;" alt="#"></a></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li class="active"> <a href="index.php">Inicio</a> </li>
                                 <li> <a href="about.php">Nosotros</a> </li>
                                 <li><a href="brand.html">Cotizador</a></li>
                                 <li><a href="productos.php">Productos</a></li>
                                 <!-- Validacion de usuario logeado o no -->
                                 <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true):?>
                                   <li><a href="logout.php">Logout</a></li>
                                <?php else:?>
                                   <li><a href="login.php">Login/REGISTRO</a></li>
                                <?php endif;?>

                             </ul>
                          </nav>
                       </div>
                    </div>
                 </div>

              </div>
           </div>
        </div>
        <!-- end header inner -->
     </header>
     <!-- end header -->
     <div class="brand">
       <div class="container">
         <div class="row">
           <div class="col-md-12">
             <div class="titlepage">
               <h2>CATALOGO DE PRODUCTOS</h2>
            </div>
         </div>
      </div>
   </div>
   <div class="brand-bg">
      <div class="container">
        <div class="row">

           <?php

                     // configuracion de la base de datos
           require_once "conectar.php";
           $sql = "SELECT * FROM productos";

           if($stmt = mysqli_prepare($link, $sql)){

                     // ejecucion de la sentencia preparada
            if(mysqli_stmt_execute($stmt)){
                     // almacena resultados
               $result=mysqli_stmt_get_result($stmt);
               while ($fila = mysqli_fetch_array($result, MYSQLI_NUM))
               {
                 
                   echo '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">';
                   echo '<div class="brand_box">';
                   if($fila[3]==0){
                   echo '<img style="-webkit-filter: grayscale(100%);
                   filter: grayscale(100%);"src="images/1.png" alt="img" />';

                   }
                   else{
                     echo '<img src="images/1.png" alt="img" />';

                   }
                   echo '<h3>$<strong class="red">'.$fila[4].'</strong></h3>';
                   echo '<span>'.$fila[1].'</span>';
                    echo '<span>Cantidad: '.$fila[3].'</span>';
                   echo '<i><img src="images/star.png"/></i>';
                   echo '<i><img src="images/star.png"/></i>';
                   echo '<i><img src="images/star.png"/></i>';
                   echo '<i><img src="images/star.png"/></i>';
                   echo '</div>';
                   echo '</div>';
                
             }
          }
       }

       ?>  



<div class="col-md-12">
   <a class="read-more">See More</a>
</div>
</div>
</div>
</div>
</div>


<!-- footer -->
<footer>
   <div id="contact" class="footer">
      <div class="container">
         <div class="row pdn-top-30">
            <div class="col-md-12 ">
               <div class="footer-box">
                  <div class="headinga">
                     <h3>Address</h3>
                     <span>Healing Center, 176 W Streetname,New York, NY 10014, US</span>
                     <p>(+71) 8522369417<br>demo@gmail.com</p>
                  </div>
                  <ul class="location_icon">
                     <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                     <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li> <a href="#"><i class="fa fa-instagram"></i></a></li>

                  </ul>
                  <div class="menu-bottom">
                     <ul class="link">
                        <li> <a href="#">Home</a></li>
                        <li> <a href="#">About</a></li>

                        <li> <a href="#">Brand </a></li>
                        <li> <a href="#">Specials  </a></li>
                        <li> <a href="#"> Contact us</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="copyright">
         <div class="container">
            <p>© 2019 All Rights Reserved. Design By<a href="https://html.design/"> Free Html Templates</a></p>
         </div>
      </div>
   </div>
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- javascript --> 
<script src="js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
   $(document).ready(function(){
      $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
      });

      $(".zoom").hover(function(){

         $(this).addClass('transition');
      }, function(){

         $(this).removeClass('transition');
      });
   });

</script> 
</body>
</html>