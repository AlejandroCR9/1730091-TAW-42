<?php
  include_once "../../conn.php";
  session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Regístrate</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
    <div class="input-group-append">
    </div>
  </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none"></li>

  <!-- Nav Item - Alerts -->
  <li class="nav-item dropdown no-arrow mx-1"></li>

  <!-- Nav Item - Messages -->
  <li class="nav-item dropdown no-arrow mx-1"></li>

  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      
      <i class="fa fa-smile-o"></i>
    </a>

    </div>

  </li>

</ul>

</nav>
<!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="width: 900px;">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Registrarse</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Nuevo</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="sqlagregarG.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-4">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="apellidos">Apellidos</label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="fecha">Fecha de Nacimiento</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                      <label for="genero">Género</label>
                      <select name="genero" id="genero" class="form-control">
                      <?php $query = $mysqli -> query ("SELECT idGenero, nombre FROM generos");
                        while ($valores = mysqli_fetch_array($query)) {
                          if (!($reg["genero"]==$valores[nombre])) {
                            echo '<option value="'.$valores[idGenero].'">'.$valores[nombre].'</option>';
                          }
                        } ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="telefono">Teléfono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="correo">Correo</label>
                      <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                      <label for="gamertag">Gamer Tag</label>
                      <input type="text" class="form-control" id="gamertag" name="gamertag" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="contra">Contraseña</label>
                      <input type="password" class="form-control" id="contra" name="contra" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="foto">Imagen de usuario</label>
                      <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="redes">Redes Sociales</label>
                      <textarea class="form-control" name="redes" id="redes" cols="80" rows="5" required></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                <a href="../../login.php" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        <span class="text">Regresar</span>
                    </a>
                    &emsp;&emsp;&emsp;&emsp;
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Guardar</span>
                    </button>
                </div>
                    
                </form>
            </div>
          </div>

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


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
