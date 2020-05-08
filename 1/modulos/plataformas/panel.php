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

  <title>Plataformas</title>

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
          <h1 class="h3 mb-2 text-gray-800">Plataformas</h1>
          <p class="mb-4">Datos de las plataformas registradas en el sistema.</p>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="agregar.php" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fa fa-pencil-square"></i>
                    </span>
                    <span class="text">Registrar plataforma</span>
                </a>
                <a onclick="window.print();" class="btn btn-info btn-circle" style="margin-left: 800px;">
                    <i class="fas fa-download" style="color: white;"></i>
                </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Plataforma</th>
                      <th>Precio x hra</th>
                      <th>Costo Monedas x hra</th>
                      <th>Monedas Ganadas x hra</th>
                      <th>Imagen</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($conn->query('SELECT p.idPlataforma AS id, p.preciohra AS precio,  p.nombre AS nombre,
                    p.costomonedas AS costomonedas, p.monedasganadas AS monedasganadas, p.rutaImagen AS imagen FROM plataformas p') as $row){ ?>
                    <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td><?php echo $row['costomonedas'] ?></td>
                        <td><?php echo $row['monedasganadas'] ?></td>
                        <td><?php $pic = $row['imagen']; echo "<img src='$pic' width='50'></img>" ?></td>
                        <td>
                          <div class="row justify-content-center">
                            <div class="col-6 justify-content-center">
                              <span>
                                <form action="editar.php" method="POST">
                                  <input type=image src="../../img/edit.png" width="20" data-toggle="tooltip" data-placement="top" title="Modificar">
                                  <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                                </form>
                            </span>
                            </div>
                            <div class="col-6 justify-content-center">
                              <span>
                              <form action="eliminar.php" method="POST">
                                <input type=image src="../../img/trash.png" width="20" data-toggle="tooltip" data-placement="top" title="Borrar">
                                <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                              </form>
                            </span>
                            </div>
                          </div> <!-- div del row -->
                        </td> <!-- espacio de las opciones -->
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
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
