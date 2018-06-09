<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tienda Rocío</title>
    <!-- aqui es -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    [endif]-->
<script src="plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="plugins/morris/raphael-min.js"></script>
<script src="plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/morris/example.css">
          <script src="plugins/jspdf/jspdf.min.js"></script>
          <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
          <?php if(isset($_GET["view"]) && $_GET["view"]=="sell"):?>
<script type="text/javascript" src="plugins/jsqrcode/llqrcode.js"></script>
<script type="text/javascript" src="plugins/jsqrcode/webqr.js"></script>
          <?php endif;?>

  </head>

  <body class="<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>  skin-blue-light sidebar-mini <?php else:?>login-page<?php endif; ?>">
    <div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):

      ?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>R</b>G</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Rocío Guzman</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <i class="fa fa-linux fa-3x"></i>
                  </i><span class=""><?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name;}?> </b> </span>
                  <span class=""><?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->lastname;
                  }?> <b class="caret"></b> </span>

                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>

                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
<!--
<div class="user-panel">
            <div class="pull-left image">
              <img src="1.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          -->
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">ADMINISTRACIÓN</li>
            <?php if(isset($_SESSION["user_id"])):?>
            <li><a href="./index.php?view=home"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            <li><a href="./?view=sell"><i class='fa fa-usd'></i> <span>Vender</span></a></li>
            <li><a href="./?view=sells"><i class='fa fa-shopping-cart'></i> <span>Ventas</span></a></li>
            <li><a href="./?view=box"><i class='fa fa-cube'></i> <span>Caja</span></a></li>
            <li><a href="./?view=products"><i class='fa fa-glass'></i> <span>Productos</span></a></li>
            <li class="treeview">
              <a href="#"><i class='fa fa-database'></i> <span>Catálogos</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=categories"><i class="fa fa-cubes"></i>Categorías</a></li>
                <li><a href="./?view=clients"><i class="fa fa-male" aria-hidden="true"></i>Clientes</a></li>
                <li><a href="./?view=providers"><i class="fa fa-user-secret"></i>Proveedores</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class='fa fa-area-chart'></i> <span>Inventario</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=inventary"><i class="fa fa-cart-arrow-down"></i>Inventario</a></li>
                <li><a href="./?view=re"><i class="fa fa-truck"></i>Abastecer</a></li>
                <li><a href="./?view=res"><i class="fa fa-shirtsinbulk"></i>Abastecimientos</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-file-text-o'></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=reports"><i class="fa fa-cart-plus"></i>Inventario</a></li>
                <li><a href="./?view=sellreports"><i class="fa fa-play-circle"></i>Ventas</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class='fa fa-cog'></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=users"><i class="fa fa-users"></i>Usuarios</a></li>
               <!-- <li><a href="./?view=settings">Configuración</a></li> -->              
                </ul>
            </li>
            <li><a href="./?view=ayuda"><i class="fa fa-question-circle"></i><span>Ayuda</span></a></li>
          <?php endif;?>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif;?>

      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
      <div class="content-wrapper">
      <div class="content">
        <?php View::load("index");?>
        </div>
      </div><!-- /.content-wrapper -->

        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 5.0
        </div>
        <strong>Copyright &copy; 2018 <a target="_blank">Diseño de Sistemas</a></strong>
      </footer>
      <?php else:?>
<div class="login-box">
      <div class="login-logo">
        <i class="fa fa-linux fa-4x"></i>
        <h1><p>¡! Bienvenido/a !¡</h1></p>
        <a href="./">Tienda Rocío<b></b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form action="./?action=processlogin" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" required class="form-control" placeholder="Usuario o Correo"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="Contraseña"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->  
      <?php endif;

      ?>


    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="plugins/dist/js/app.min.js" type="text/javascript"></script>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
</html>

