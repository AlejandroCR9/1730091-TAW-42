<?php
  include_once "../../conn.php";
  session_start();
  
  $usuario = $_SESSION['idUsuario'];
  if ($usuario == null || $usuario == ''){
    header("Location: ../../login.php");
    die();
  }
  date_default_timezone_set('America/Mexico_City');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  
    <script type="text/javascript">
        var aux=15;
        function totalA(){
          //console.log(document.getElementById('tiempo').value);
          document.getElementById('total').value = document.getElementById('tiempo').value * aux;
        }

        function setPrecio(){
          var id=document.getElementById('consola').value;  
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              aux = this.responseText;
              document.getElementById('total').value = document.getElementById('tiempo').value * aux;
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

  <title>Rentas </title>

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
          <h1 class="h3 mb-2 text-gray-800">Registrar renta</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Nuevo</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="sqlagregar.php">
                <div class="form-group row">
                    <div class="col-sm-2">
                  
                      <input type="text" class="form-control" id="fecha" name="fecha" value=<?php echo (date("Y").'/'.date("m").'/'.date("d"))?>  readonly required>
                    </div>
                    <div class="col-sm-2">
                     
                      <input type="text" class="form-control" id="hora" name="hora" value=<?php echo (date("h").':'.date("i"))?>  readonly required>
                    </div>                  
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="usuario">Gamer</label>
                        <!--<input type="date" class="form-control" id="fecha" name="fecha">-->
                        <select name="usuario" id="usuario" class="form-control">
                        <?php $query = $mysqli -> query ("SELECT idUsuario, gamerTag FROM usuarios");
                          while ($valores = mysqli_fetch_array($query)) {
                            //if (!($reg["genero"]==$valores[nombre])) {
                              echo '<option value="'.$valores['idUsuario'].'">'.$valores['gamerTag'].'</option>';
                              
                            //}
                          } ?>

                        </select>
                      </div>
                    <div class="col-sm-3">
                      <label for="tiempo">Tiempo</label>
                      <!--<input type="date" class="form-control" id="fecha" name="fecha">-->
                      <select name="tiempo" id="tiempo" class="form-control" onclick="totalA()">
                        <option value=".5">30 min</option>
                        <option value="1">1 hr</option>
                        <option value="2">2 hr</option>
                        <option value="3">3 hr</option>
                        <option value="4">4 hr</option>
                        <option value="5">5 hr</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label for="consola">Num. Consola</label>
                      <!--<input type="date" class="form-control" id="fecha" name="fecha">-->
                      <select name="consola" id="consola" class="form-control" onclick="setPrecio()">
                      <?php $query = $mysqli -> query ("SELECT c.idConsola, c.numero, p.preciohra FROM consolas c INNER JOIN plataformas p WHERE c.idPlataforma =p.idPlataforma");
                        while ($valores = mysqli_fetch_array($query)) {
                          //if (!($reg["genero"]==$valores[nombre])) {
                            echo '<option value="'.$valores['idConsola'].'">'.$valores['numero'].'</option>';
                            
                          //}
                        } ?>

                      </select>
                    </div>
                    <div class="col-sm-2">
                      <label for="monedas">Monedas x hra</label>
                      <input type="text" class="form-control" id="monedas" name="monedas" value=30 required>
                    </div> 
                    <div class="col-sm-6">
                      <label for="telefono">Accesorios</label>
                      <input type="number" class="form-control" id="telefono" placeholder="No disponible" name="telefono" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="total">Total</label>
                      <input type="text" class="form-control" id="total" name="total" value="7.5" readonly required>
                    </div> 
                </div>
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
