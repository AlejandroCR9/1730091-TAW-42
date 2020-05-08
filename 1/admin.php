<?php
  include_once "conn.php";
  session_start();
  
  $usuario = $_SESSION['idUsuario'];
  if ($usuario == null || $usuario == ''){
    header("Location: login.php");
    die();
  }
  /*
  $sql="SELECT total FROM ingresos"; 
  $ingresos=0;
  $result = mysqli_query($conn, $sql);
  while ($valores = mysqli_fetch_array($result)) {
    $ingresos = $ingresos+$valores['total'];
  }
  $sql="SELECT total FROM egresos"; 
  $egresos=0;
  $result = mysqli_query($conn, $sql);
  while ($valores = mysqli_fetch_array($result)) {
    $egresos = $egresos+$valores['total'];
  }
  $balance = $ingresos - $egresos;

  $sql = "SELECT COUNT(*) FROM usuarios";
  $result = mysqli_query($conn, $sql);
  $usuarios = mysqli_fetch_array($result);
  */
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Escritorio</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/icon.png">
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <!--<i class="fas fa-laugh-wink"></i>-->
    <i class="fa fa-user-circle"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Administrador</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="admin.php">
    <i class="fa fa-tasks"></i>
    <span>Escritorio</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Módulos
</div>


<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="modulos/gamers/panel.php">
    <i class="fa fa-users"></i>
    <span>Gamers</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
    <i class="fa fa-desktop"></i>
    <span>Equipos</span></a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="modulos/consolas/panel.php">
        Consolas        
      </a>
      <a class="dropdown-item" href="modulos/plataformas/panel.php">
        Plataformas        
      </a>
      <a class="dropdown-item" href="modulos/accesorios/panel.php">
        Accesorios        
      </a>

    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="modulos/juegos/panel.php">
    <i class="fa fa-gamepad"></i>
    <span>Juegos</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="modulos/torneos/panel.php">
    <i class="fa fa-trophy"></i>
    <span>Torneos</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="modulos/renta/panel.php">
    <i class="fa fa-credit-card"></i>
    <span>Renta</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="modulos/tarifas/panel.php">
    <i class="fa fa-dollar"></i>
    <span>Tarifas</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="modulos/promociones/panel.php">
    <i class="fa fa-gift"></i>
    <span>Promociones</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="modulos/dulceria/panel.php">
    <i class="fa fa-user"></i>
    <span>Dulcería</span></a>
</li>


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php
        include "topbar.php";
      ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          
          <center>
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4" style="background-image:url(img/bg/oscuro2.png)">
                <!-- Card Body -->
                <div class="card-body">
                  <img src="img/panel-admin.png" alt="">
                </div>
              </div>
            </div>
          </div>
          </center>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

       

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona "Cerrar Sesión" si estas listo para terminar tu sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="logout.php">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <!-- Captura pantalla -->

</body>

</html>
