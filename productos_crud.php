<?php session_start();?>
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

<body class="main-layout ">
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
                                <div class="logo">
                                    <a href="index.php"><img src="images/Logos/naranti.jpg" style="height: 10vh;" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="productos_crud.php">Productos</a> </li>
                                        <li> <a href="usuarios_crud.php">Usuarios</a> </li>
                                        <li><a href="ventas.php">Ventas</a></li>
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
    <div class="container">
    <h1>Administracion de Productos</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Código</th>
          <th>Descripcion</th>
          <th>Categoria</th>
          <th class="text-right">Precio</th>
          <th class="text-right">Edición</th>
        </tr>
      </thead>
      <tbody id="datos">
      </tbody>
    </table>
    <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
    <hr>
    <button type="button" id="btnFinalizar" class="btn btn-success">Finalizar</button>
  </div>

  <!-- Modal(Agregar, modificar y borrar) -->
  <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_producto" name="Codigo">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Nombre:</label>
              <input type="text" id="Codigo" class="form-control" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Descripcion:</label>
              <input type="text" id="Descripcion" class="form-control" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Cantidad:</label>
              <input type="number" id="CodigoCategoria" class="form-control" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Costo:</label>
              <input type="number" id="Precio" class="form-control" placeholder="">
            </div>
          </div>

         

        </div>
        <div class="modal-footer">
          <button type="button" id="btnConfirmarAgregar" class="btn btn-success">Agregar</button>
          <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
          <button type="button" id="btnBorrar" class="btn btn-success">Borrar</button>
          <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ModalConfirmarCancelar -->
  <div class="modal fade" id="ModalConfirmarBorrar" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="max-width: 600px" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1>Realmente quiere borrarlo?</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnConfirmarBorrado" class="btn btn-success">Confirmar</button>
          <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
 <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/crud_productos.js"></script>
   <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>