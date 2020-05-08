<?php
  include_once "../../conn.php";
  session_start();
  
  $usuario = $_SESSION['idUsuario'];
  if ($usuario == null || $usuario == ''){
    header("Location: ../../login.php");
    die();
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Juegos</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../../img/icon.png">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
        include "../../sidebar.php"
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php
        include "../../topbar.php";
      ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Registrar juego</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Nuevo</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="sqlagregar.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-4">
                      <label for="titulo">Título</label>
                      <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="plataforma">Plataforma</label>
                      <!--<input type="date" class="form-control" id="fecha" name="fecha">-->
                      <select name="plataforma" id="plataforma" class="form-control">
                      <?php $query = $mysqli -> query ("SELECT idPlataforma, nombre FROM plataformas");
                        while ($valores = mysqli_fetch_array($query)) {
                          if (!($reg["plataforma"]==$valores[nombre])) {
                            echo '<option value="'.$valores[idPlataforma].'">'.$valores[nombre].'</option>';
                          }
                        } ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="foto">Imagen</label>
                      <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>
                    <a href="panel.php" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        <span class="text">Regresar</span>
                    </a>
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Guardar</span>
                    </button>
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

  <?php
    include "../../logout-modal.php";
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>
