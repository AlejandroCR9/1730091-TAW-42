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

  <title>Accesorios</title>

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
          <h1 class="h3 mb-2 text-gray-800">Modificar accesorio</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Actualizar</h6>
            </div>
            <div class="card-body">
              <?php
               $Id=$_POST["id"];
              $sql="SELECT idAccesorio, idConsola, descripcion, unidades, preciorenta FROM accesorios WHERE idAccesorio = '$Id'";
              $datos=mysqli_query($conn,$sql);
              $reg=mysqli_fetch_array($datos);
              ?>
                <form class="user" method="POST" action="sqleditar.php">
                <input type="hidden" name="id" value=<?php print_r($reg["idAccesorio"]); ?>>
                <div class="form-group row">
                    <div class="col-sm-4">
                      <label for="descripcion">Descripción</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" required value=<?php print_r($reg["descripcion"]); ?>>
                    </div>
                    <div class="col-sm-4">
                      <label for="fecha">Consola</label>
                      <!--<input type="date" class="form-control" id="fecha" name="fecha">-->
                      <select name="consola" id="consola" class="form-control" required>
                      <?php $query = $mysqli -> query ("SELECT idConsola FROM consolas");
                        while ($valores = mysqli_fetch_array($query)) {
                          if (($reg["idConsola"]==$valores[idConsola])) {
                            echo '<option value="'.$valores[idConsola].'" selected>'.$valores[idConsola].'</option>';
                          }else{
                             echo '<option value="'.$valores[idConsola].'">'.$valores[idConsola].'</option>';
                          }
                        } ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="unidades">Unidades</label>
                      <input type="text" class="form-control" id="unidades" name="unidades" value=<?php print_r($reg["unidades"]); ?>>
                    </div>
                    <div class="col-sm-4">
                      <label for="preciorenta">Precio</label>
                      <input type="number" class="form-control"  min=0 id="preciorenta" name="preciorenta" value=<?php print_r($reg["preciorenta"]); ?>>
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
