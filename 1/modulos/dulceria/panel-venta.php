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
  <script type="text/javascript">
        var aux=0;

        function setPrecio(){
          var id=document.getElementById('producto').value;  
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              aux = this.responseText;
              document.getElementById('precio').value = aux;
            }
          };
          xmlhttp.open("GET", "obtenerPrecio.php?q=" + id, true);
          xmlhttp.send();
          console.log (aux);
        }
    </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dulcería</title>

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

<body id="page-top" onload="setPrecio()">

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
          <h1 class="h3 mb-2 text-gray-800">Dulcería</h1>
          <p class="mb-4">Venta y registro de aperitivos.</p>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="catalogo/panel.php" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fa fa-pencil-square"></i>
                    </span>
                    <span class="text">Catálogo de dulces</span>
                </a>
                <a onclick="window.print();" class="btn btn-info btn-circle" style="margin-left: 600px;">
                    <i class="fas fa-download" style="color: white;"></i>
                </a>
            </div>
            <div class="card-body">
              <div>
                <?php 
                  $Id = $_POST["gamer"];
                  $sql="SELECT idUsuario,gamerTag FROM usuarios WHERE idUsuario = '$Id'";
                  $datos=mysqli_query($conn,$sql);
                  $reg=mysqli_fetch_array($datos);
                ?>
                  <div class="form-group row justify-content-center">
                    <div class="col-sm-2">
                      <label for="gamer">Venta realizada a</label>
                      <input type="text" class="form-control" id="gamer" name="gamer" value=<?php print_r($reg["gamerTag"]); ?> readonly>
                      
                    </div>
                    <div class="col-sm-3">
                      <label for="producto">Producto</label>
                      <select name="producto" id="producto" class="form-control" onclick="setPrecio()">
                      <?php $query = $mysqli -> query ("SELECT idDulce, nombre FROM dulceria");
                        while ($valores = mysqli_fetch_array($query)) {
                          if (!($reg["producto"]==$valores[nombre])) {
                            echo '<option value="'.$valores[nombre].'">'.$valores[nombre].'</option>';
                          }
                        } ?>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <label for="precio">Precio</label>
                      <input type="text" class="form-control" id="precio" name="precio" readonly>

                    </div>
                    <div class="col-sm-1">
                      <label for="unidades">Unidades</label>
                      <input type="number" class="form-control" id="unidades" value="0" min="1" max="50" name="unidades" required>
                    </div>
                    <div class="col-sm-2">
                        <br>
                        <button onclick="agregar();" class="btn btn-success btn-icon-split" id="agregar">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Agregar</span>
                        </button>
                        <button onclick="guardar();" class="btn btn-info btn-icon-split" id="guardar" hidden>
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Guardar</span>
                        </button>
                    </div>
                    <!--
                    <div class="col-sm-3">
                        <br>
                        <button onclick="guardar();" class="btn btn-success btn-icon-split" hidden>
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Guardar</span>
                        </button>
                    </div>-->
                  </div>
                  <hr>
                  <!--<form class="user" method="POST">-->
                  <div class="table-responsive">
                <table class="table table-bordered" id="tabla" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Producto</th>
                      <th>Precio Unitario</th>
                      <th>Unidades</th>
                      <th>Monto</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                        <td colspan="4">Total a pagar: </td>
                        <td id="total">$ 0</td>
                        <input id="oculto" hidden> 0</td>
                    </tr>
                </tfoot>
                </table>
              </div>


                  <hr>
                  <a href="panel.php" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-times"></i>
                        </span>
                        <span class="text">Cancelar</span>
                    </a>
                    <button type="submit" class="btn btn-success btn-icon-split" onclick="enviar()">
                        <span class="icon text-white-50">
                            <i class="fas fa-file-text"></i>
                        </span>
                        <span class="text">Registrar venta</span>
                    </button>
                <!--</form>-->
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
  <script type="text/javascript" src="../../js/venta.js"></script>
</body>

</html>
